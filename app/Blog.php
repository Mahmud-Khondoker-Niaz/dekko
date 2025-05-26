<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    //use SoftDeletes;
    protected $fillable=['title','name','image','designation','description','slug','feature','blogcategory_id','user_id','check'];
   //protected $dates =['deleted_at'];
    protected $SoftDeletes = true;

    public function blogcategory(){
        return $this->belongsTo('App\Blogcategory');
    }

    public function getFeaturedAttribute($feature){
        return asset($feature);
    }
public function comments(){
        return $this->hasMany('App\Comment');
    }


}
