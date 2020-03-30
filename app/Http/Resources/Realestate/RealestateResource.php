<?php

namespace App\Http\Resources\Realestate;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Gallery;
class RealestateResource extends JsonResource
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
            'id'=>$this->id,
            'property_name'=> $this->property_name,
            'property_status'=> $this->property_status,
            'property_price'=> $this->property_price,
            'price_status'=> $this->price_status,
            'district'=>$this->district,
                        'address'=>$this->address,
                        'city'=>$this->city,
 'province'=>$this->province,
 'house_number'=>$this->house_number,
 'zip_code'=>$this->zip_code,
            'ward_number'=>$this->ward_number,
            'country'=>$this->country,
            'property_area' =>$this->property_area,
            'number_of_floors' =>$this->number_of_floors,
            'number_of_bedrooms' =>$this->number_of_bedrooms,
            'number_of_bathrooms' =>$this->number_of_bathrooms,
            'description' =>$this->description,
            'building_age'=> $this->building_age,
            'gym' =>$this->gym,
            'garden' =>$this->garden,
            'swimming_pool'=>$this->swimming_pool,
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
            'user_id'=>$this->user_id,
            'featured' =>$this->featured,
            'display_photo'=>Gallery::where('realestate_id',$this->id)->pluck('photos')->first(),

            'photos'=>Gallery::where('realestate_id',$this->id)->get(['id','photos'])


            
        ];
    }
}
