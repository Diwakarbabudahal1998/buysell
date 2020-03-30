<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }
    
    // Validation Rules
    public function rules()
    {
        return [
            'rolename'=> 'required',
            'permission'=>'required',
        ];
    }

    // Validation messages
    public function messages()
    {
        return [
            'rolename.required' => 'Role field cannot be empty  ',
            'permission.required'=>'No permission selected',
            
        ];
    }
}
