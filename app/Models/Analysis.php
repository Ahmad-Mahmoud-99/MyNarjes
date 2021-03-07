<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Analysis extends Authenticatable
{
    //
    protected  $table='analysis';
    public $timestamps=false;
    protected $fillable = [
        	'group_id',	'parent_id','analysis_name','price','count',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

     public function scopeSelection($query){
         return $query->select('analysis_id','group_id','parent_id','analysis_name','price','count');
     }

     public function group(){
         return $this->belongsTo('App\Models\Group', 'group_id', 'group_id');
     }
     public function input(){
        return $this->hasMany('App\Models\Inputs', 'input_id', 'input_id');
    }

    public function analysis_requierd(){
        return $this->belongsTo('App\Models\Analysis_requierd', 'analysis_id', 'analysis_id');
    }



    }
