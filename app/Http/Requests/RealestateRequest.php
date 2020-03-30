<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealestateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'property_name'=>'required',
            'price_status'=>'required',
            'property_status'=>'required',
            'property_price'=>'required',
            'country'=>'required',
            'address'=>'required',
            'district'=>'required',
            'province'=>'required',
            'city'=>'required',
            'ward_number'=>'required',
            'zip_code'=>'required',
            'property_area'=>'required',
            'number_of_floors'=>'required',
            'number_of_bedrooms'=>'required',
            'number_of_bathrooms'=>'required',
            'number_of_kitchen'=>'required',
            'mohoda_length'=>'required',
            'mohoda_direction'=>'required',
            'built_year'=>'required',
            'description'=>'required',
            'category_name'=>'required',
            'area_type'=>'required',

     
        ];
    }
}
