@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.patient.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.alias') }}
                    </th>
                    <td>
                        {{ $patient->alias }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.age') }}
                    </th>
                    <td>
                        {{ $patient->age }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{trans('global.patient.fields.gender') }}
                    </td>
                    <td>
                        {{ $patient->gender }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.patient.fields.identified_date') }}
                    </th>
                    <td>
                        {{ $patient->identified_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{trans('global.patient.fields.home_location')}}
                    </th>
                    <td>
                        {{$patient->home_location}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{trans('global.patient.fields.exposure_location')}}
                    </th>
                    <td>
                        {{$patient->exposure_location}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{trans('global.patient.fields.exposure_state')}}
                    </th>
                    <td>
                        {{$patient->exposure_state}}
                    </td>
                </tr>
            @foreach($patient->patientStatuses as $patientStatus)
                <tr>
                    <th>
                        {{trans('global.patient.fields.hospital') }} : {{trans('global.patient.fields.state_date') }}
                        : {{trans('global.patient.fields.patient_state') }}
                    </th>
                    <td>
                        {{$patientStatus->hospital}} : {{$patientStatus->state_date}} : {{$patientStatus->state}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
