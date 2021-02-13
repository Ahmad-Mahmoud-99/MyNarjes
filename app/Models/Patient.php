<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Patient extends Authenticatable
{
    //
    protected  $table='patient';
    protected $fillable = [
        'f_name','m_name','l_name','age','gender','birthday','phone','address','email','created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'created_at','updated_at'
    ];

     public function scopeSelection($query){
         return $query->select('patient_id','f_name','m_name','l_name','age','gender','birthday','phone','address','email');
     }
    }
