@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.patient.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.patients.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('alias') ? 'has-error' : '' }}">
                <label for="alias">{{ trans('global.patient.fields.alias') }}*</label>
                <input type="text" id="alias" name="alias" class="form-control"
                       value="{{ old('alias', isset($patient) ? $patient->alias : '') }}">
                @if($errors->has('alias'))
                    <p class="help-block">
                        {{ $errors->first('alias') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.alias_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
                <label for="age">{{ trans('global.patient.fields.age') }}*</label>
                <input type="number" id="age" name="age" class="form-control"
                       value="{{ old('age', isset($patient) ? $patient->age : '') }}">
                @if($errors->has('age'))
                    <p class="help-block">
                        {{ $errors->first('age') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.age_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('home_location') ? 'has-error' : '' }}">
                <label for="home_location">{{ trans('global.patient.fields.home_location') }}*</label>
                <input type="text" id="home_location" name="home_location" class="form-control"
                       value="{{ old('home_location', isset($patient) ? $patient->home_location : '') }}">
                @if($errors->has('home_location'))
                    <p class="help-block">
                        {{ $errors->first('home_location') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.alias_helper') }}
                </p>
            </div>
            <div class="form-group"
                 data-toggle="tooltip" data-placement="top" data-html="true"
                 title="{{ trans('global.patient.fields.gender_helper') }}">
                <label for="gender">{{ trans('global.patient.fields.gender') }}</label>
                <select id="gender" name="gender"
                        class="form-control select2 big-select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                        style="width: 100%;" required>
                    <option
                        selected="selected">{{ old('gender', isset($patient) ? $patient->patientStatuses()->latest('state_date')->first()->gender: '') }}</option>
                    <option> MALE</option>
                    <option> FEMALE</option>
                    <option> UNKNOWN</option>
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.gender_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group {{ $errors->has('exposure_location') ? 'has-error' : '' }}">
                <label for="aliaexposure_locations">{{ trans('global.patient.fields.exposure_location') }}*</label>
                <input type="text" id="exposure_location" name="exposure_location" class="form-control"
                       value="{{ old('exposure_location', isset($patient) ? $patient->exposure_location : '') }}">
                @if($errors->has('exposure_location'))
                    <p class="help-block">
                        {{ $errors->first('exposure_location') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.patient.fields.exposure_location_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="identified_date">{{ trans('global.patient.fields.identified_date') }}</label>
                <input type="text" id="identified_date" name="identified_date"
                       class="form-control {{ $errors->has('identified_date') ? 'is-invalid' : '' }}"
                       value="{{ old('identified_date', isset($patient) ? $patient->identified_date : '') }}"
                       data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                       data-toggle="tooltip" data-placement="top" data-html="true"
                       title="{{ trans('global.patient.fields.identified_date_helper') }}" data-mask>
                @if($errors->has('identified_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identified_date') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.identified_date_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group"
                 data-toggle="tooltip" data-placement="top" data-html="true"
                 title="{{ trans('global.patient.fields.exposure_state_helper') }}">
                <label for="exposure_state">{{ trans('global.patient.fields.exposure_state') }}</label>
                <select id="exposure_state" name="exposure_state"
                        class="form-control select2 big-select2 {{ $errors->has('exposure_state') ? 'is-invalid' : '' }}"
                        style="width: 100%;" required>
                    @foreach($exposureStates as $exposureState)
                        <option
                            value="{{ $exposureState }}" {{ old('exposure_state', isset($patient) ? $patient->exposure_state:'')==$exposureState ? 'selected' : '' }}>
                            {{ $exposureState}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('exposure_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exposure_state') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.exposure_state_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group" data-toggle="tooltip"
                 data-placement="top" data-html="true"
                 title="{{ trans('global.patient.fields.exposed_from') }}">
                <label for="exposed_from">{{ trans('global.patient.fields.exposed_from') }}</label>
                <select id="exposed_from" name="exposed_from"
                        class="form-control select2 {{ $errors->has('exposed_from') ? 'is-invalid' : '' }}"
                        style="width: 100%;">
                    <option></option>
                    @foreach($patients as $patient_id=>$alias)
                        <option
                            value="{{ $patient_id }}" {{ old('exposed_from', isset($patient) ? $patient->exposed_from:'')==$patient_id ? 'selected' : '' }}>
                            {{ $alias}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('exposed_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exposed_from') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.exposed_from_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group" data-toggle="tooltip"
                 data-placement="top" data-html="true"
                 title="{{ trans('global.patient.fields.clusterQC') }}">
                <label for="cluster_q_c_id">{{ trans('global.patient.fields.clusterQC') }}*</label>
                <select id="cluster_q_c_id" name="cluster_q_c_id"
                        class="form-control select2 {{ $errors->has('cluster_q_c_id') ? 'is-invalid' : '' }}"
                        style="width: 100%;" required>
                    <option></option>
                    @foreach($clusterQCs as $clusterQC)
                        <option
                            value="{{ $clusterQC->id }}" {{ old('cluster_q_c_id', isset($patient) ? $patient->cluster_q_c_id:'')==$clusterQC->id ? 'selected' : '' }}>
                            {{ $clusterQC->cluster_name}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('cluster_q_c_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cluster_q_c_id') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.clusterQC_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group"
                 data-toggle="tooltip" data-placement="top" data-html="true"
                 title="{{ trans('global.patient.fields.patient_state_helper') }}">
                <label for="patient_state">{{ trans('global.patient.fields.exposure_state') }}</label>
                <select id="patient_state" name="patient_state"
                        class="form-control select2 big-select2 {{ $errors->has('patient_state') ? 'is-invalid' : '' }}"
                        style="width: 100%;" required>
                    @foreach($patientStatuses as $patientStatus)
                        <option
                            value="{{ $patientStatus }}" {{ old('patient_state', isset($patient) ? $patient->patientStatuses()->latest('state_date')->first()->state:'')==$patientStatus ? 'selected' : '' }}>
                            {{ $patientStatus}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('patient_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_state') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.patient_state_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group"
                 data-toggle="tooltip" data-placement="top" data-html="true"
                 title="{{ trans('global.patient.fields.hospital_helper') }}">
                <label for="hospital">{{ trans('global.patient.fields.hospital') }}</label>
                <select id="hospital" name="hospital"
                        class="form-control select2 big-select2 {{ $errors->has('hospital') ? 'is-invalid' : '' }}"
                        style="width: 100%;" required>
                    <option
                        selected="selected">{{ old('hospital', isset($patient) ? $patient->patientStatuses()->latest('state_date')->first()->hospital: '') }}</option>
                    <option> NIID</option>
                    <option> NHSL</option>
                    <option> TH Ragama</option>
                    <option> TH Karapitiya</option>
                    <option> TH Anuradhapuraya</option>
                    <option> TH Kurunegala</option>
                    <option> TH Jaffna</option>
                    <option> NH Kandy</option>
                    <option> KEGALLE</option>
                    <option> TH Battico</option>
                    <option> BATTICOLOA</option>
                    <option> DGH Gampaha</option>
                    <option> BADULLA DGH </option>
                    <option> Negombo</option>
                    <option> TH Rathnapura</option>
                    <option> MATARA</option>
                    <option> PGH Badulla</option>
                    <option> LRH</option>
                    <option> DMH</option>
                    <option> DGH Polonaruwa</option>
                    <option> TH Kalubowila</option>
                    <option> Castle St TH</option>
                    <option> BH Hambanthota</option>
                    <option> BH Monaragala </option>
                    <option> BH Welikanda</option>
                    <option> DGH Kaluthara</option>
                    <option> Chest H. Welisara</option>
                    <option> Colombo East</option>
                    <option> Base Hospital</option>
                    <option> BH Homagama</option>
                    <option> Dr Neville Fernando</option>
                </select>
                @if($errors->has('hospital'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hospital') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.hospital_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="identified_date">{{ trans('global.patient.fields.state_date') }}</label>
                <input type="text" id="state_date" name="state_date"
                       class="form-control {{ $errors->has('state_date') ? 'is-invalid' : '' }}"
                       value="{{ old('state_date', isset($patient) ? $patient->patientStatuses()->latest('state_date')->first()->state_date : '') }}"
                       data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                       data-toggle="tooltip" data-placement="top" data-html="true"
                       title="{{ trans('global.patient.fields.state_date_helper') }}" data-mask>
                @if($errors->has('state_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state_date') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.patient.fields.state_date_error') }}
                    </div>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#identified_date').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    </script>
    <script type="text/javascript">
        $('#state_date').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
