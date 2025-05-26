<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=['reply'];
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
