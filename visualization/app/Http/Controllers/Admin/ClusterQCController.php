<?php

namespace App\Http\Controllers\Admin;

use App\ClusterQC;
use App\Http\Requests\MassDestroyClusterQCRequest;
use App\Http\Requests\StoreClusterQCRequest;
use App\Http\Requests\UpdateClusterQCRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClusterQCController extends Controller
{

    public function index()
    {
        abort_unless(\Gate::allows('cluster_access'), 403);

        $clusterQCs = ClusterQC::all();

        return view('admin.clusterQCs.index', compact('clusterQCs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('cluster_create'), 403);

        return view('admin.clusterQCs.create');
    }

    public function store(StoreClusterQCRequest $request)
    {
        abort_unless(\Gate::allows('cluster_create'), 403);

        $clusterQC = ClusterQC::create($request->all());

        return redirect()->route('admin.clusterQCs.index');
    }

    public function edit(ClusterQC $clusterQC)
    {
        abort_unless(\Gate::allows('cluster_edit'), 403);


        return view('admin.clusterQCs.edit', compact ('clusterQC'));
    }

    public function update(UpdateClusterQCRequest $request, ClusterQC $clusterQC)
    {
        abort_unless(\Gate::allows('cluster_edit'), 403);

        $clusterQC->update($request->all());

        return redirect()->route('admin.clusterQCs.index');
    }

    public function show(ClusterQC $clusterQC)
    {
        abort_unless(\Gate::allows('cluster_show'), 403);


        return view('admin.clusterQCs.show', compact('clusterQC'));
    }

    public function destroy(ClusterQC $clusterQC)
    {
        abort_unless(\Gate::allows('cluster_delete'), 403);

        $clusterQC->delete();

        return back();
    }

    public function massDestroy(MassDestroyClusterQCRequest $request)
    {
        ClusterQC::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
