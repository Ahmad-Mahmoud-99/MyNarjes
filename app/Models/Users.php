<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected  $table='user';
    protected $fillable = [
        'role_id','f_name','m_name','l_name','age', 'username','password','phone','address','email','start_date','end_date','created_at','updated_at',
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
         return $query->select('role_id','f_name','m_name','l_name','age', 'username','password','phone','address','email');
     }
    // public function setPasswordAttribute($password){
    //     if(!empty($password)){
    //         return $this->attributes['password']=bcrypt($password);
    //     }
    // }
    
}
