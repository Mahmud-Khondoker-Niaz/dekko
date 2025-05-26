<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['user_id','institue','agent_result','agent_degree'];
	public $timestamps = false;
    
}