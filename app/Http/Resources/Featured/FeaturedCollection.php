<?php

namespace App\Http\Resources\Featured;
Use  App\Models\Gallery;
use Illuminate\Http\Resources\Json\Resource;

class FeaturedCollection extends Resource
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
            'property_name'=> $this->property_name,
            'district'=>$this->district,
            'address'=>$this->address,
            'property_status'=>$this->property_status,
            'property_price'=>$this->property_price,
            'property_area'=>$this->property_area,
            'photos'=>Gallery::where('realestate_id',$this->id)->pluck('photos')->first(),
            'href'=>[
                'viewfeaturedbyid'=>route('realestates.show',$this->id),
            ]
         ];
    }
}
