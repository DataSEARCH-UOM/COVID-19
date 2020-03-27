<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prediction extends Model
{
    //
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'predicted_count',
        'created_at',
        'updated_at',
        'deleted_at',
        'predicted_for_date',
        'prediction_date',
        'cluster_q_c_id',
    ];

    public function cluster(){
        return $this->belongsTo(ClusterQC::class);
    }
}
