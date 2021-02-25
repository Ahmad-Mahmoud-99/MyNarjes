<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Analysis_requierd extends Authenticatable
{
    //
    protected  $table='analysis_required';
    protected $fillable = [

         'analysis_id', 'patient_id', 'doctor_id', 'time',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

     public function scopeSelection($query){
         return $query->select('id', 'analysis_id', 'patient_id', 'doctor_id', 'time');
     }

     public function analysis(){
         return $this->hasMany('App\Models\Analysis', 'analysis_id', 'analysis_id');
     }

    public function doctor(){
        return $this->hasMany('App\Models\doctor', 'doctor_id', 'doctor_id');
    }




    }
