<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Brandcategory extends Model
{
    //use SoftDeletes;
    protected $fillable=['id','name','slug','productscategory_id'];
   //protected $dates =['deleted_at'];
    protected $SoftDeletes = true;

    public function productscategory(){
        return $this->belongsTo('App\Productscategory');
    }

    public function getFeaturedAttribute($feature){
        return asset($feature);
    }
public function productsbrand(){
        return $this->hasMany('App\Productsbrand');
    }


}
