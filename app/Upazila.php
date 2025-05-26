<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $table = 'upazilas';

    protected $fillable = ['district_id','name'];

	 public $timestamps = false;
    
}
