<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Doctor extends Authenticatable
{
    //
    protected  $table='doctor';
    protected $fillable = [


        'name', 'address' ,'phone', 'email',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

     public function scopeSelection($query){
         return $query->select('doctor_id','name', 'address' ,'phone', 'email');
     }

     public function analysis_requierd(){
         return $this->hasMany('App\Models\Analysis_requierd', 'doctor_id', 'doctor_id');
     }




    }
