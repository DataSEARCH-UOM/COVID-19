<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClusterQC extends Model
{
    use SoftDeletes;

    //
    protected $hidden = [

    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $fillable = [
        'cluster_name',
        'lat',
        'long',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function patients(){
        return $this->hasMany(Patient::class);
    }

    public function predictions(){
        return $this->hasMany(Prediction::class);
    }
}
