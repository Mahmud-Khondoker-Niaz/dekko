<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquire extends Model
{
    protected $table = 'enquire';

    protected $fillable = ['property_id','enquiry_property','verify_user_id',
    'name','email','phone','message','property_size_form','property_size_to','property_location','property_status','budget','facing',
    'floor_position','lead_source','verify','verify_date','reffered_by','refer_person_name','refer_person_phone',
    'refer_person_address','relation','special_note'];
 
	
	// public $timestamps = false;
    

    public function user(){
        return $this->belongsTo(User::class); 
    }

}
