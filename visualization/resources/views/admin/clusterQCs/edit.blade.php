@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.clusterQC.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clusterQCs.update", [$clusterQC->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('cluster_name') ? 'has-error' : '' }}">
                <label for="cluster_name">{{ trans('global.clusterQC.fields.cluster_name') }}*</label>
                <input type="text" id="cluster_name" name="cluster_name" class="form-control" value="{{ old('cluster_name', isset($clusterQC) ? $clusterQC->cluster_name : '') }}">
                @if($errors->has('cluster_name'))
                    <p class="help-block">
                        {{ $errors->first('cluster_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.clusterQC.fields.cluster_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                <label for="lat">{{ trans('global.clusterQC.fields.lat') }}*</label>
                <input type="text" id="lat" name="lat" class="form-control" value="{{ old('lat', isset($clusterQC) ? $clusterQC->lat : '') }}">
                @if($errors->has('lat'))
                    <p class="help-block">
                        {{ $errors->first('lat') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.clusterQC.fields.lat_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('long') ? 'has-error' : '' }}">
                <label for="long">{{ trans('global.clusterQC.fields.long') }}*</label>
                <input type="text" id="long" name="long" class="form-control" value="{{ old('long', isset($clusterQC) ? $clusterQC->long : '') }}">
                @if($errors->has('long'))
                    <p class="help-block">
                        {{ $errors->first('long') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.clusterQC.fields.long_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
