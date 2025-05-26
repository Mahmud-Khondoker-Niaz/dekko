<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    //use SoftDeletes;

    protected $fillable =[
      'service_name','slug','service_description','category_id','subcategory_id','childcategory_id','service_image','service_phone','service_cost','user_id','status'
    ];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }
  //  protected $dates =['deleted_at'];
	
    public function pcategory(){
        return $this->belongsTo('App\ServiceCategory');
    }

    // public function subcategory()
    // {
    //     return $this->belongsTo('App\ServiceSubcategory');
    // }

    // public function childcategory()
    // {
    //     return $this->belongsTo('App\ServiceChildcategory');
    // }



}
