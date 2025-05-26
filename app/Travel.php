<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travels';
    protected $fillable=['image_home','image_page','description'];
   

    public $timestamps = false;


}
