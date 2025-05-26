<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    protected $fillable = ['name','slug'];
    
     public $timestamps = false;

     public function subs()
     {
         return $this->hasMany('App\ServiceSubcategory')->where('status','=',1)->orderBy('position','asc');
     }

    public function services(){
        return $this->hasMany('App\Service');
    }
    
    
}
