<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUniversityRequest;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\City;
use App\Models\Department;
use App\Models\Language;
use App\Models\University;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UniversityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('university_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $universities = University::with(['departments', 'city', 'languages'])->get();

        return view('admin.universities.index', compact('universities'));
    }

    public function create()
    {
        abort_if(Gate::denies('university_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('name_en', 'id');

        $cities = City::pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages = Language::pluck('name_en', 'id');

        return view('admin.universities.create', compact('cities', 'departments', 'languages'));
    }

    public function store(StoreUniversityRequest $request)
    {
        $university = University::create($request->all());
        $university->departments()->sync($request->input('departments', []));
        $university->languages()->sync($request->input('languages', []));

        return redirect()->route('admin.universities.index');
    }

    public function edit(University $university)
    {
        abort_if(Gate::denies('university_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('name_en', 'id');

        $cities = City::pluck('title_en', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages = Language::pluck('name_en', 'id');

        $university->load('departments', 'city', 'languages');

        return view('admin.universities.edit', compact('cities', 'departments', 'languages', 'university'));
    }

    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->all());
        $university->departments()->sync($request->input('departments', []));
        $university->languages()->sync($request->input('languages', []));

        return redirect()->route('admin.universities.index');
    }

    public function show(University $university)
    {
        abort_if(Gate::denies('university_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $university->load('departments', 'city', 'languages');

        return view('admin.universities.show', compact('university'));
    }

    public function destroy(University $university)
    {
        abort_if(Gate::denies('university_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $university->delete();

        return back();
    }

    public function massDestroy(MassDestroyUniversityRequest $request)
    {
        University::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
