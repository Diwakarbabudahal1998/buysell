<?php

namespace App\Http\Resources\Realestate;

use Illuminate\Http\Resources\Json\Resource;
use App\Models\Gallery;

class RealestateCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
            'realestate_id'=>$this->id,
            'property_name'=> $this->property_name,

            'status'=> $this->property_status,
            'price'=> $this->property_price,
            'location'=>$this->address.','.$this->district,
            'property_status'=>$this->property_status,
            'number_of_bedrooms'=> $this->number_of_bedrooms,
            'number_of_bathrooms'=> $this->number_of_bathrooms,
            'property_area'=> $this->property_area,
            'listed_on'=> $this->created_at,
            'photos'=>Gallery::where('realestate_id',$this->id)->pluck('photos')->first(),
            'href'=>[
                'singleview'=>route('realestates.show',$this->id),
            ]
            ];
    }
}
