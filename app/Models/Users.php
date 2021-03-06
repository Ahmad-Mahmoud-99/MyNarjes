<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
    //
    protected  $table='user';
    protected $fillable = [
        'role_id','f_name','m_name','l_name','age','username','password','phone','address','email','status','start_date','end_date','created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','created_at','updated_at'
    ];

     public function scopeSelection($query){
         return $query->select('id','role_id','f_name','m_name','l_name','age', 'username','password','phone','address','email','status','start_date','end_date');
     }
     public function getActive(){
        return $this->status ==1?'active':'not active';
    }
    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id', 'role_id');
    }


    }
