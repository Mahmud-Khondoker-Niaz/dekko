<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    //use SoftDeletes;
    protected $fillable=['name','weight','description','slug','image','productsbrand_id'];
   //protected $dates =['deleted_at'];
    protected $SoftDeletes = true;

    
    public function getFeaturedAttribute($feature){
        return asset($feature);
    }
    public function productsbrand(){
        return $this->belongsTo('App\Productsbrand');
    }

    


}
