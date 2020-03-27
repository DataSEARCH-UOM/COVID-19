<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Patient extends Model
{
    //
    use SoftDeletes;

    protected $hidden = [

    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'alias',
        'age',
        'gender',
        'identified_date',
        'home_location',
        'exposure_location',
        'exposed_from',
        'exposure_state',
        'cluster_q_c_id',
        'deleted_at',

    ];


    public function patientStatuses(){
        return $this->hasMany(PatientStatus::class);
    }

    public function clusterQC(){
        return $this->belongsTo(ClusterQC::class);
    }
    public static function getPossibleExposureStateValues(){
        $instance = new static; // create an instance of the model to be able to get the table name
        $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "exposure_state"') )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            $enum[] = $v;
        }
        return $enum;
    }
}
