<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productscategory extends Model
{
    protected $fillable =[
        'name','slug'
    ];
    public function productsbrand(){
        return $this->hasMany('App\Productsbrand');
    }
    public function brandcategory(){
        return $this->hasMany('App\Brandcategory');
    }
  
}
