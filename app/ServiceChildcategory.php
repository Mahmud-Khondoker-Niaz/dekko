<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceChildcategory extends Model
{
    protected $table = 'service_childcategories';

    protected $fillable = ['name','subcategory_id','slug'];
    
     public $timestamps = false;

     public function services(){
        return $this->hasMany('App\Service');
    }
     
     public function subcategory()
     {
         return $this->belongsTo('App\ServiceSubcategory');
     }
    
}
