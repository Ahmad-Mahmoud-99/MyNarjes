<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NormalRange extends Model
{
    //
    protected  $table='normal_range';
    protected $fillable = [
        'analysis_id','input_id','high_range','low_range'

    ];
    protected $hidden = [

    ];
    public $timestamps=false;

    public function scopeSelection($query){
        return $query->select('id','analysis_id','input_id','high_range','low_range');
    }
    public function analysis(){
       return $this->belongsTo('App\Models\Analysis', 'analysis_id','analysis_id');
    }
    public function  input(){
        return $this->hasOne('App\Models\Inputs', 'input_id','input_id');
    }
    
}
