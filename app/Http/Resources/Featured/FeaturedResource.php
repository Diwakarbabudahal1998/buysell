<?php

namespace App\Http\Resources\Featured;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'property_name'=> $this->property_name,
            'property_status'=> $this->property_status,
            'property_price'=> $this->property_price,
            'price_status'=> $this->price_status,
            'location'=>$this->district.''.$this->ward_number.''.$this->country,
            'district'=>$this->district,
            'address'=>$this->address,
            'property_area' =>$this->property_area,
            'number_of_floors' =>$this->number_of_floors,
            'number_of_bedrooms' =>$this->number_of_bedrooms,
            'number_of_bathrooms' =>$this->number_of_bathrooms,
            'description' =>$this->description,
            'building_age'=> $this->building_age,
            'gym' =>$this->gym,
            'garden' =>$this->garden,
            'swimmingpool'=>$this->swimmingpool,
            'internet' =>$this->internet,
            'parking' =>$this->parking,
            'water' =>$this->water,
            'school_college_nearby' =>$this->school_college_nearby,
            'shopping_nearby' =>$this->shopping_nearby,
            'bank_nearby' =>$this->bank_nearby,
            'pitched_road' =>$this->pitched_road,
            'airport_nearby' =>$this->airport_nearby,
            'sewage' =>$this->sewage,
            'alarm' =>$this->alarm,
            'cctv' =>$this->cctv,
            'ac' =>$this->ac,

            
        ];
    }
}
