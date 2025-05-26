<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable=['image_home','image_page','description'];
   

    public $timestamps = false;


}
