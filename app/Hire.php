<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    protected $table = 'hires';

    protected $fillable = ['sellertype','seller_id','seller_name','seller_phone','seller_email','agent_id','agent_name','agent_phone','agent_email','hiretype','status'];
 
    
}
