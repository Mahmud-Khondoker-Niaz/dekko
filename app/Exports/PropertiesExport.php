<?php

namespace App\Exports;

use App\User;
use App\Upazila;
use App\SubscriptionPlan;
use App\Properties;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class PropertiesExport implements FromCollection, WithHeadings, ShouldAutoSize , WithEvents, WithMapping
{
    public function collection()
    {
        return Properties::orderBy('id','DESC')->get(['product_code','id','user_id','property_name','property_type','price','rate_per_sft','address','location','land_area','build_area','bedrooms',
        'land_area','build_area','balcony','facing','no_of_floor','available_floor','floor','unit','garage']);
    }

    public function map($property): array
    {
        return [       
	$property->product_code,          
            'FLY-ID:'.$property->id,
            getUserInfo($property->user_id)->name,
            getUserInfo($property->user_id)->phone,
            $property->property_name,
            $property->address,
            getPropertyTypeName($property->property_type)->types,
            //$property->property_purpose,
            $property->price,
            $property->rate_per_sft,
            getPropertyLocationName($property->location)->name,  
            $property->land_area,   
            $property->build_area,   
            $property->bedrooms,  
            $property->bathrooms,
            $property->balcony,
            $property->facing,
            $property->no_of_floor,                          
            $property->available_floor,
            $property->floor,
            $property->unit,
            $property->garage,
           // SubscriptionPlan::getSubscriptionPlanInfo($property->active_plan_id,'plan_name'),
            //$property->property_exp_date?date('m-d-Y',$property->property_exp_date):''
        ];
    }

    public function headings(): array
    {
        return [
  'Product Code',
            'Property ID',
            'Seller Name',
            'Seller Phone',
            'Property Name',
            'Address',
            'Property Type',
            'Total Price',
            'Rate Per SFT',
            'Area',
            'Land Area (Katha)',
            'Sise (sft)',
            'Bedrooms',
            'Bathrooms',
            'Balcony',
            'Facing',
            'No of Floor',
            'Available floor',
            'Floor',
            'Unit',
            'Garage',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:K1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}