<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable=['name','image','designation','email','linkdn'];
   

    public $timestamps = false;


}
