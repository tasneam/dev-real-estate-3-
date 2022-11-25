@extends('layouts.admin')
@section('content')
@can('realestate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.realestates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realestate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realestate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Realestate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.video') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.video_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.title_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.title_tr') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.salon_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.room_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.property_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.year_of_creation') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.owner_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.realestate.fields.city') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realestates as $key => $realestate)
                        <tr data-entry-id="{{ $realestate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $realestate->id ?? '' }}
                            </td>
                            <td>
                                @foreach($realestate->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($realestate->video)
                                    <a href="{{ $realestate->video->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $realestate->video_url ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->title_tr ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->price ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Realestate::STATUS_RADIO[$realestate->status] ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->salon_num ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->room_num ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->area ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->property_type ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Realestate::ACTIVE_RADIO[$realestate->active] ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->year_of_creation ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->location ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->owner_name ?? '' }}
                            </td>
                            <td>
                                {{ $realestate->city->title_en ?? '' }}
                            </td>
                            <td>
                                @can('realestate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.realestates.show', $realestate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('realestate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.realestates.edit', $realestate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('realestate_delete')
                                    <form action="{{ route('admin.realestates.destroy', $realestate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('realestate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.realestates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Realestate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection