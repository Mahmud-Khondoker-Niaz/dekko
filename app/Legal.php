<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    protected $table = 'legals';
    protected $fillable=['image_home','image_page','description'];
   

    public $timestamps = false;


}
