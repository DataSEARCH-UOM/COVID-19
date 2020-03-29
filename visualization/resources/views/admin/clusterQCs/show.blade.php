@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.clusterQC.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.clusterQC.fields.cluster_name') }}
                    </th>
                    <td>
                        {{ $clusterQC->cluster_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.clusterQC.fields.lat') }}
                    </th>
                    <td>
                        {{ $clusterQC->lat }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.clusterQC.fields.long') }}
                    </th>
                    <td>
                        {{ $clusterQC->long }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.clusterQC.fields.created_at') }}
                    </th>
                    <td>
                        {{ $clusterQC->created_at }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
