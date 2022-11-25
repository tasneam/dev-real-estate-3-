<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealestateRequest;
use App\Http\Requests\StoreRealestateRequest;
use App\Http\Requests\UpdateRealestateRequest;
use App\Models\City;
use App\Models\Realestate;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RealestatesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('realestate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realestates = Realestate::with(['city', 'media'])->get();

        return view('admin.realestates.index', compact('realestates'));
    }

    public function create()
    {
        abort_if(Gate::denies('realestate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.realestates.create', compact('cities'));
    }

    public function store(StoreRealestateRequest $request)
    {
        $realestate = Realestate::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $realestate->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($request->input('video', false)) {
            $realestate->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $realestate->id]);
        }

        return redirect()->route('admin.realestates.index');
    }

    public function edit(Realestate $realestate)
    {
        abort_if(Gate::denies('realestate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $realestate->load('city');

        return view('admin.realestates.edit', compact('cities', 'realestate'));
    }

    public function update(UpdateRealestateRequest $request, Realestate $realestate)
    {
        $realestate->update($request->all());

        if (count($realestate->images) > 0) {
            foreach ($realestate->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realestate->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realestate->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if ($request->input('video', false)) {
            if (!$realestate->video || $request->input('video') !== $realestate->video->file_name) {
                if ($realestate->video) {
                    $realestate->video->delete();
                }
                $realestate->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
            }
        } elseif ($realestate->video) {
            $realestate->video->delete();
        }

        return redirect()->route('admin.realestates.index');
    }

    public function show(Realestate $realestate)
    {
        abort_if(Gate::denies('realestate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realestate->load('city');

        return view('admin.realestates.show', compact('realestate'));
    }

    public function destroy(Realestate $realestate)
    {
        abort_if(Gate::denies('realestate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realestate->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealestateRequest $request)
    {
        Realestate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('realestate_create') && Gate::denies('realestate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Realestate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
