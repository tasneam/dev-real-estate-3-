@extends('layouts.admin')
@section('content')
@can('travel_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.travels.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.travel.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.travel.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Travel">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.title_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.title_tr') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.hotel_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.visa') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.airline_tickets') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.translator') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.days_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.travel.fields.active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($travels as $key => $travel)
                        <tr data-entry-id="{{ $travel->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $travel->id ?? '' }}
                            </td>
                            <td>
                                {{ $travel->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $travel->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $travel->title_tr ?? '' }}
                            </td>
                            <td>
                                @if($travel->image)
                                    <a href="{{ $travel->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $travel->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $travel->price ?? '' }}
                            </td>
                            <td>
                                {{ $travel->hotel_name ?? '' }}
                            </td>
                            <td>
                                {{ $travel->visa ?? '' }}
                            </td>
                            <td>
                                {{ $travel->airline_tickets ?? '' }}
                            </td>
                            <td>
                                {{ $travel->translator ?? '' }}
                            </td>
                            <td>
                                {{ $travel->days_num ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Travel::ACTIVE_RADIO[$travel->active] ?? '' }}
                            </td>
                            <td>
                                @can('travel_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.travels.show', $travel->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('travel_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.travels.edit', $travel->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('travel_delete')
                                    <form action="{{ route('admin.travels.destroy', $travel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('travel_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.travels.massDestroy') }}",
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
  let table = $('.datatable-Travel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection