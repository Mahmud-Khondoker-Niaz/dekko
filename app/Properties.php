<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $table = 'properties';

    protected $fillable = ['user_id','property_name','property_type','property_purpose','sale_price','rent_price','rate_per_sft','address','po','location',
    'map_latitude','map_longitude','bathrooms','bedrooms',
    'garage','land_area','build_area','balcony','no_of_floor','facing','available_floor','floor','unit','loan_facility','area','description','featured_image',

    'nearest_school_km',
    'nearest_hospital_km',
    'nearest_bus_stand_km',
    'nearest_railway_km',
    'nearest_airport_km',
    'nearest_mall_km',
    'nearest_park_km',
    'nearest_mosque_km',
    'nearest_playground_km',
    'nearest_departmental_store_km',
    'nearest_restaurant_km',
    'nearest_fire_service_km',
    'nearest_police_station_km',
    'nearest_pharmacy_km',
    'nearest_grocery_bazar_km',
    'nearest_govt_office_km',
    'amenities_servent_bed',
    'amenities_servent_bath',
    'amenities_gym',
    'amenities_front_yard',
    'amenities_splash_pool',
    'amenities_roof_deck',
    'amenities_reception',
    'amenities_rooftop_garden',
    'amenities_generator',
    'amenities_substation',
    'amenities_lift',
    'amenities_kitchen_veranda',
    'amenities_kitchen_cabinet',
    'amenities_corner_plot',
    'amenities_guest_lobby',
    'amenities_cctv',
    'amenities_swimming_pool',
    'amenities_guest_parking',
    'amenities_laundry_room',
    'amenities_bbq',
    'amenities_terrace',
    'amenities_sauna',
    'position_id',
    'position_exp_date',
    'position_status',
  
];
    
    public static function getPropertyInfo($id) 
    { 
        return Properties::find($id);
    }
    
	public function scopeSearchByKeyword($query, $keyword,$purpose,$type)
    { 
			 
            if($keyword!='' and $purpose!='' and $type!='')
            {
                $query->where(function ($query) use ($keyword,$purpose,$type) {
                $query->where("status", "1")
                    ->where("property_purpose", "$purpose")
                    ->where("property_type", "$type")
  			->orWhere("product_code", 'like', '%' .$keyword. '%')
                    ->orWhere("address", 'like', '%' .$keyword. '%')
                    ->orWhere("property_name", 'like', '%' .$keyword. '%');                      
                });
            }
            elseif ($purpose!='' and $type!='') 
            {
                        $query->where(function ($query) use ($keyword,$purpose,$type) {
                        $query->where("status", "1")
                            ->where("property_purpose", "$purpose")
                            ->where("property_type", "$type");                      
                        });
            }
            elseif ($purpose!='') 
            {
                        $query->where(function ($query) use ($keyword,$purpose,$type) {
                        $query->where("status", "1")->where("property_purpose", "$purpose");                      
                        });
            }
            elseif ($type!='') 
            {
                        $query->where(function ($query) use ($keyword,$purpose,$type) {
                        $query->where("status", "1")->where("property_type", "$type");                      
                        });
            }                                   
            else
            {
                $query->where(function ($query) use ($keyword,$purpose,$type) {
                $query->where("status", "1")
                    ->where("address", 'like', '%' .$keyword. '%')
  			->orWhere("product_code", 'like', '%' .$keyword. '%')
                    ->orWhere("property_name", 'like', '%' .$keyword. '%');                      
                });
            }
 
        return $query;
    }	
    
    public function interests(){
        return $this->belongsToMany('App\Interest');
    }
    
}
