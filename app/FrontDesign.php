<?php

namespace app;
use Illuminate\Database\Eloquent\Model;
class FrontDesign extends Model{
    protected $tabl= 'front_designs';
    protected $fillable =['title','image','link','type'];
}