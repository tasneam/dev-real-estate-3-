@extends('layouts.admin')
@section('content')
@can('university_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.universities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.university.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.university.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-University">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.university.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.name_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.name_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.name_tr') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.university_ranking') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.educational_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.department') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.university.fields.language') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($universities as $key => $university)
                        <tr data-entry-id="{{ $university->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $university->id ?? '' }}
                            </td>
                            <td>
                                {{ $university->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $university->name_ar ?? '' }}
                            </td>
                            <td>
                                {{ $university->name_tr ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\University::UNIVERSITY_RANKING_SELECT[$university->university_ranking] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\University::EDUCATIONAL_LEVEL_SELECT[$university->educational_level] ?? '' }}
                            </td>
                            <td>
                                @foreach($university->departments as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_en }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $university->city->title_en ?? '' }}
                            </td>
                            <td>
                                @foreach($university->languages as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_en }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('university_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.universities.show', $university->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('university_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.universities.edit', $university->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('university_delete')
                                    <form action="{{ route('admin.universities.destroy', $university->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('university_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.universities.massDestroy') }}",
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
  let table = $('.datatable-University:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection