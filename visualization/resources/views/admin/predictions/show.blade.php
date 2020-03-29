@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.prediction.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.prediction.fields.clusterQC') }}
                    </th>
                    <td>
                        {{ $prediction->cluster->cluster_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.prediction.fields.predicted_count') }}
                    </th>
                    <td>
                        {{ $prediction->predicted_count }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.prediction.fields.predicted_for_date') }}
                    </th>
                    <td>
                        {{ $prediction->predicted_for_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.prediction.fields.prediction_date') }}
                    </th>
                    <td>
                        {{ $prediction->prediction_date }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
