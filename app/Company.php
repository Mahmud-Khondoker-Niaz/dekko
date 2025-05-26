<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = ['user_id', 'company', 'start_date', 'end_date' ,'position', 'department'];
	public $timestamps = false;
    
}