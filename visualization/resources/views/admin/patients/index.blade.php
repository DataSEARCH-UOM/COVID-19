@extends('layouts.admin')
@section('content')
    @can('patient_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.patients.create") }}">
                    {{ trans('global.add') }} {{ trans('global.patient.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('global.patient.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.patient.fields.alias') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.age') }}
                        </th>
                        <td>
                            {{trans('global.patient.fields.gender') }}
                        </td>
                        <th>
                            {{ trans('global.patient.fields.identified_date') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.home_location') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.exposure_location') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.exposed_from') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.exposure_state') }}
                        </th>
                        <th>
                            {{ trans('global.patient.fields.cluster') }}
                        </th>
                        <td>
                            {{trans('global.patient.fields.hospital') }}
                        </td>
                        <td>
                            {{trans('global.patient.fields.state_date') }}
                        </td>
                        <td>
                            {{trans('global.patient.fields.patient_state') }}
                        </td>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $key => $patient)
                        <tr data-entry-id="{{ $patient->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $patient->alias ?? '' }}
                            </td>
                            <td>
                                {{ $patient->age ?? '' }}
                            </td>
                            <td>
                                {{$patient->gender ?? ''}}
                            </td>
                            <td>
                                {{ $patient->identified_date ?? '' }}
                            </td>
                            <td>
                                {{ $patient->home_location }}
                            </td>
                            <td>
                                {{ $patient->exposure_location }}
                            </td>
                            <td>
                                <a href=""></a>
                            </td>
                            <td>
                                {{ $patient->exposure_state }}
                            </td>
                            <td>
                                {{ $patient->clusterQC->cluster_name ?? '' }}
                            </td>
                            <td>
                                {{$patient->patientStatuses()->latest('state_date')->first()->hospital ?? ''}}
                            </td>
                            <td>
                                {{$patient->patientStatuses()->latest('state_date')->first()->state_date ?? ''}}
                            </td>
                            <td>
                                {{$patient->patientStatuses()->latest('state')->first()->state ?? ''}}
                            </td>
                            <td>
                                @can('patient_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.patients.show', $patient->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('patient_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.patients.edit', $patient->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('patient_delete')
                                    <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                url: "{{ route('admin.patients.massDestroy') }}",
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
            @can('patient_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
@endsection
