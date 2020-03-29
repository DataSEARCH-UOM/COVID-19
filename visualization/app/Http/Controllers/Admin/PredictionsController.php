<?php

namespace App\Http\Controllers\Admin;

use App\ClusterQC;
use App\Http\Requests\StorePredictionRequest;
use App\Prediction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PredictionsController extends Controller
{

    public function index()
    {
        abort_unless(\Gate::allows('prediction_access'), 403);

        $predictions = Prediction::all();

        return view('admin.predictions.index', compact('predictions'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('prediction_create'), 403);
        $clusterQCs = ClusterQC::all();//->pluck('cluster_name', 'id');

        return view('admin.predictions.create', compact('clusterQCs'));
    }

    public function store(StorePredictionRequest $request)
    {
        abort_unless(\Gate::allows('prediction_create'), 403);

        $prediction = Prediction::create($request->all());

        return redirect()->route('admin.predictions.index');
    }

    public function edit(prediction $prediction)
    {
        abort_unless(\Gate::allows('prediction_edit'), 403);

        $clusterQCs = ClusterQC::all();//->pluck('cluster_name', 'id');

        $prediction->load('roles');

        return view('admin.predictions.edit', compact('clusterQCs', 'prediction'));
    }

    public function update(UpdatePredictionRequest $request, Prediction $prediction)
    {
        abort_unless(\Gate::allows('prediction_edit'), 403);

        $prediction->update($request->all());
        $prediction->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.predictions.index');
    }

    public function show(prediction $prediction)
    {
        abort_unless(\Gate::allows('prediction_show'), 403);

        $prediction->load('roles');

        return view('admin.predictions.show', compact('prediction'));
    }

    public function destroy(prediction $prediction)
    {
        abort_unless(\Gate::allows('prediction_delete'), 403);

        $prediction->delete();

        return back();
    }

    public function massDestroy(MassDestroyPredictionRequest $request)
    {
        Prediction::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
