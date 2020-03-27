@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group" data-toggle="tooltip"
                 data-placement="top" data-html="true"
                 title="{{ trans('global.prediction.fields.clusterQC') }}">
                <label for="cluster_q_c_id">{{ trans('global.prediction.fields.clusterQC') }}*</label>
                <select id="cluster_q_c_id" name="cluster_q_c_id"
                        class="form-control select2 {{ $errors->has('cluster_q_c_id') ? 'is-invalid' : '' }}"
                        style="width: 100%;" required>
                    <option></option>
                    @foreach($clusterQCs as $clusterQC)
                        <option
                            value="{{ $clusterQC->id }}" {{ old('cluster_q_c_id', isset($prediction) ? $prediction->cluster_q_c_id:'')==$clusterQC->id ? 'selected' : '' }}>
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
                        {{ trans('global.prediction.fields.clusterQC_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group {{ $errors->has('predicted_count') ? 'has-error' : '' }}">
                <label for="predicted_count">{{ trans('global.prediction.fields.predicted_count') }}*</label>
                <input type="number" id="predicted_count" name="predicted_count" class="form-control"
                       value="{{ old('predicted_count', isset($prediction) ? $prediction->predicted_count : '') }}">
                @if($errors->has('predicted_count'))
                    <p class="help-block">
                        {{ $errors->first('predicted_count') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.prediction.fields.predicted_count_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="predicted_for_date">{{ trans('global.prediction.fields.predicted_for_date') }}</label>
                <input type="text" id="predicted_for_date" name="predicted_for_date"
                       class="form-control {{ $errors->has('predicted_for_date') ? 'is-invalid' : '' }}"
                       value="{{ old('predicted_for_date', isset($prediction) ? $prediction->predicted_for_date : '') }}"
                       data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                       data-toggle="tooltip" data-placement="top" data-html="true"
                       title="{{ trans('global.prediction.fields.predicted_for_date_helper') }}" data-mask>
                @if($errors->has('predicted_for_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('predicted_for_date') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.prediction.fields.predicted_for_date_error') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="prediction_date">{{ trans('global.prediction.fields.prediction_date') }}</label>
                <input type="text" id="prediction_date" name="prediction_date"
                       class="form-control {{ $errors->has('prediction_date') ? 'is-invalid' : '' }}"
                       value="{{ old('prediction_date', isset($prediction) ? $prediction->prediction_date : '') }}"
                       data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                       data-toggle="tooltip" data-placement="top" data-html="true"
                       title="{{ trans('global.prediction.fields.prediction_date_helper') }}" data-mask>
                @if($errors->has('prediction_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prediction_date') }}
                    </div>
                @else
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        {{ trans('global.prediction.fields.prediction_date_error') }}
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
        $('#prediction_date').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    </script>
    <script type="text/javascript">
        $('#predicted_for_date').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
