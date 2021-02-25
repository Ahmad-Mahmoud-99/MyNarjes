<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Analysis extends Authenticatable
{
    //
    protected  $table='analysis';
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
    }