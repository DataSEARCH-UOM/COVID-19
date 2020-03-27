<?php

namespace App\Http\Controllers\Admin;

use App\ClusterQC;
use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Patient;
use App\PatientStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('patient_access'), 403);

        $patients = Patient::all();

        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('patient_create'), 403);

        $clusterQCs = ClusterQC::all();//->pluck('cluster_name', 'id');
        $exposureStates = Patient::getPossibleExposureStateValues();
        $patients = Patient::all()->pluck('alias','id');
        $patientStatuses = PatientStatus::getPossiblePatientStatusValues();

        return view('admin.patients.create', compact('clusterQCs','exposureStates','patients','patientStatuses'));
    }

    public function store(StorePatientRequest $request)
    {
        abort_unless(\Gate::allows('patient_create'), 403);

        $patient = Patient::create($request->all());
        $patientStatusReq = $request->all();
        $patientStatusReq['patient_id'] = $patient->id;
        $patientStatusReq['state'] = $patientStatusReq['patient_state'];
        $patientStatus = PatientStatus::create($patientStatusReq);

//        var_dump($request);
        return redirect()->route('admin.patients.index');
    }

    public function edit(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);

        $clusterQCs = ClusterQC::all();//->pluck('cluster_name', 'id');
        $exposureStates = Patient::getPossibleExposureStateValues();
        $patients = Patient::all()->pluck('alias','id');
        $patientStatuses = PatientStatus::getPossiblePatientStatusValues();


        return view('admin.patients.edit', compact('clusterQCs', 'patient','exposureStates','patients','patientStatuses'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        abort_unless(\Gate::allows('patient_edit'), 403);

        $patient->update($request->all());
        $currentPatientStatus = $patient->patientStatuses()->latest()->first();
        $patientStatusReq = $request->all();
        $patientStatusReq['patient_id'] = $patient->id;
        $patientStatusReq['state'] = $patientStatusReq['patient_state'];

        if ($currentPatientStatus->state != $request['state'] || $currentPatientStatus['hospital'] != $request['hospital']){
            $newPatientStatus = PatientStatus::create($patientStatusReq);
        }

        return redirect()->route('admin.patients.index');
    }

    public function show(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_show'), 403);

        return view('admin.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        abort_unless(\Gate::allows('patient_delete'), 403);

        $patient->delete();

        return back();
    }

    public function massDestroy(MassDestroyPatientRequest $request)
    {
        Patient::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
