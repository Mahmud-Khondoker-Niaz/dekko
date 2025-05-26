<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model{

    protected $filable=['location','size','contact','requirement'];
}