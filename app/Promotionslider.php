<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotionslider extends Model
{
    protected $table = 'promotion_slider';

    protected $fillable = ['name','link','photo','status','created_at','updated_at'];
	
	 //public $timestamps = false;
    
}
