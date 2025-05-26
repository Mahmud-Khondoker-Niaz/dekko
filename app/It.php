<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class It extends Model
{
    protected $table = 'its';
    protected $fillable=['image_home','image_page','description'];
   

    public $timestamps = false;


}
