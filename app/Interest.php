<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interests';

    protected $fillable = ['agent_id','agent_name','agent_phone','property_id','property_name','status'];

    public function propertiess(){
        return $this->belongsTo('App\Properties');
    }

}
