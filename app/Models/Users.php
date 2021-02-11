<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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
        'password', 'remember_token','created_at','updated_at'
    ];
    public function getLogoAttribute($val){
        return ($val!==null)?asset('assests/'.$val) :"";
     }
     public function scopeSelection($query){
         return $query->select('role_id','f_name','m_name','l_name','age', 'username','password','phone','address','email');
     }
    public function setPasswordAttribute($password){
        if(!empty($password)){
            return $this->attributes['password']=bcrypt($password);
        }
    }
    //relations
    //  public function category(){
    //      return $this->belongsTo('App\Models\MainCategory','category_id','id');
    //  }
}
