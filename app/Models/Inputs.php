<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inputs extends Model
{
    //
    protected  $table='inputs';
    protected $fillable = [
        	'input_name','analysis_id',
    ];
    protected $hidden = [

    ];
    public $timestamps=false;
    public function scopeSelection($query){
        return $query->select('input_id','input_name','analysis_id');
    }
    public function analysis(){
       return $this->hasMany('App\Models\Analysis', 'group_id', 'analysis_id');
    }
    public function analysis_f(){
        return $this->belongsTo('App\Models\Analysis', 'input_id', 'analysis_id');
    }
    public function  normalrang(){
        return $this->hasOne('App\Models\NormalRange', 'input_id','id');
    }
}
