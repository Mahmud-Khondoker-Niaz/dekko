<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    protected $fillable =[
        'name','slug'
    ];

    public function blogs(){
        return $this->hasMany('App\Blog');
    }

}
