<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Varify extends Model
{
    protected $table = 'varify';
    protected $fillable = ['id','otp'];
}
