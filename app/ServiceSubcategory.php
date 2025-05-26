<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSubcategory extends Model
{
    protected $table = 'service_subcategories';

    protected $fillable = ['name','category_id','slug'];
    
     public $timestamps = false;

     public function services(){
        return $this->hasMany('App\Service');
    }
     
     public function parentcategory()
     {
         return $this->belongsTo('App\ServiceCategory');
     }
     
}
