<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PatientStatus extends Model
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
        'state_date',
        'hospital',
        'state',
        'patient_id',
    ];


    public function patient(){
        $this->belongsTo(Patient::class);
    }

    public static function getPossiblePatientStatusValues(){
//        $instance = new static; // create an instance of the model to be able to get the table name
//        $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "state"') )[0]->Type;
//        preg_match('/^enum\((.*)\)$/', $type, $matches);
//        $enum = array();
//        foreach(explode(',', $matches[1]) as $value){
//            $v = trim( $value, "'" );
//            $enum[] = $v;
//        }
        $enum = ['QUARANTINE','SELF_QUARANTINE','COVID_POSITIVE','CRITICAL','DEAD','RECOVERED'];
        return $enum;
    }
}
