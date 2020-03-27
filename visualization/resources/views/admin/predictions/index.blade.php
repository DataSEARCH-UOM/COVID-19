@extends('layouts.admin')
@section('content')
@can('prediction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.predictions.create") }}">
                {{ trans('global.add') }} {{ trans('global.prediction.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.prediction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.prediction.fields.clusterQC') }}
                        </th>
                        <th>
                            {{ trans('global.prediction.fields.predicted_count') }}
                        </th>
                        <th>
                            {{ trans('global.prediction.fields.predicted_for_date') }}
                        </th>
                        <th>
                            {{ trans('global.prediction.fields.prediction_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($predictions as $key => $prediction)
                        <tr data-entry-id="{{ $prediction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $prediction->cluster->cluster_name ?? '' }}
                            </td>
                            <td>
                                {{ $prediction->predicted_count ?? '' }}
                            </td>
                            <td>
                                {{ $prediction->prediction_for_date ?? '' }}
                            </td>
                            <td>
                                {{ $prediction->prediction_date ?? '' }}
                            </td>
                            <td>
                                @can('prediction_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.predictions.show', $prediction->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('prediction_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.predictions.edit', $prediction->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('prediction_delete')
                                    <form action="{{ route('admin.predictions.destroy', $prediction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.predictions.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('prediction_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
