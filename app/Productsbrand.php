<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Productsbrand extends Model
{
    //use SoftDeletes;
    protected $fillable=['id','name','image','description','feature','slug','productscategory_id','brandcategory_id'];
   //protected $dates =['deleted_at'];
    protected $SoftDeletes = true;

    public function brandcategory(){
        return $this->belongsTo('App\Brandcategory');
    }
    public function productscategory(){
        return $this->belongsTo('App\Productscategory');
    }

    public function getFeaturedAttribute($feature){
        return asset($feature);
    }
public function skus(){
        return $this->hasMany('App\Sku');
    }


}
