<?php

namespace App\Http\Controllers\Guest;

use App\ClusterQC;
use App\District;
use App\Message;
use App\Patient;
use App\PatientStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use DateTime;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        $dates = [];
        $start_date = new DateTime('2020-01-27');
        $china_recover_date = new DateTime('2020-02-19');
        $today = new DateTime();
        array_push($dates,  $start_date->format("Y-m-d"));
        array_push($dates,  $china_recover_date->format("Y-m-d"));

        $period = new \DatePeriod(new DateTime('2020-03-09'), new \DateInterval('P1D'),$today );
        foreach ($period as $date) {
           array_push( $dates, $date->format("Y-m-d"));
        }

        $covid_positives = [];
        $total_covid_positives = 0;
        foreach($dates as $date){
            $patient_states= PatientStatus::whereDate('state_date',$date)->where('state','COVID_POSITIVE')->get();
            if($patient_states){
                $covid_positives[] = count($patient_states);
                $total_covid_positives += count($patient_states);

            }else {
                $covid_positives[] = 0;
            }

        }
        $criticals = [];
        $total_criticals = 0;
        foreach($dates as $date){
            $patient_states= PatientStatus::whereDate('state_date',$date)->where('state','CRITICAL')->get();
            if($patient_states){
                $criticals[] = count($patient_states);
                $total_criticals += count($patient_states);

            }else {
                $criticals[] = 0;
            }

        }
        $diseased = [];
        $total_diseased = 0;
        foreach($dates as $date){
            $patient_states= PatientStatus::whereDate('state_date',$date)->where('state','DEAD')->get();
            if($patient_states){
                $diseased[] = count($patient_states);
                $total_diseased += count($patient_states);
            }else {
                $diseased[] = 0;
            }

        }
        $recovered = [];
        $total_recovered = 0;
        foreach($dates as $date){
            $patient_states= PatientStatus::whereDate('state_date',$date)->where('state','RECOVERED')->get();
            if($patient_states){
                $recovered[] = count($patient_states);
                $total_recovered += count($patient_states);
            }
            else {
                $recovered[] = 0;
            }

        }

        $patients = Patient::all();
        $genderBy = Patient::groupBy('gender')->select('gender', DB::raw('count(*) as total'))->get();
        $gender_count = [];
        $genderToday = Patient::whereDate('identified_date',$today)->groupBy('gender')->select('gender', DB::raw('count(*) as total'))->get();

        foreach ($genderBy as $gender){
            $gender_count[$gender->gender] = $gender->total;
        }
        $gender_count_today = [];
        foreach ($genderToday as $gender){
            $gender_count_today[$gender->gender] = $gender->total;
        }

        $messages = Message::all();

        $clusterQCsCount =   DB::table('patients')->join('cluster_q_c_s', 'patients.cluster_q_c_id', '=', 'cluster_q_c_s.id')->select('cluster_q_c_s.cluster_name','cluster_q_c_s.lat','cluster_q_c_s.lat','cluster_q_c_s.long', DB::raw("count(patients.id) as count"))->groupBy('cluster_q_c_s.cluster_name','cluster_q_c_s.lat','cluster_q_c_s.long')->get();
        //        var_dump([$dates,$covid_positives,$criticals,$diseased,$recovered,$gender_count,$patients]);

        $age_distribution_labels = ['1-20','21-40','41-60','60-80','80 <'];
        $age_distribution = [0,0,0,0,0];
        foreach ($patients as $patient){
            if ($patient->age <= 20){
                $age_distribution[0] += 1;
            } else if ($patient->age <= 40){
                $age_distribution[1] += 1;
            }else if ($patient->age <= 60){
                $age_distribution[2] += 1;
            }else if ($patient->age <= 80){
                $age_distribution[3] += 1;
            }else{
                $age_distribution[4] += 1;
            }
        }

        $districts = [];
        $district_count = [];
        $districtObjs = District::all();
        foreach ($districtObjs as $districtObj){
            $districts[] = $districtObj->district;
            $district_count[] = $districtObj->count;
        }

        return view('guest.dashboard',compact('dates','covid_positives','criticals','diseased','recovered',
            'gender_count','patients','gender_count_today','total_covid_positives','total_criticals','total_diseased',
            'total_recovered','messages','clusterQCsCount','age_distribution_labels','age_distribution','districts','district_count'));
    }
}
