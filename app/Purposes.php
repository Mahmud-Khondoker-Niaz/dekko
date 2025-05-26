<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purposes extends Model
{
    protected $table = 'property_purposes';

    protected $fillable = ['purpose','slug'];
	
	 public $timestamps = false;
    
}
