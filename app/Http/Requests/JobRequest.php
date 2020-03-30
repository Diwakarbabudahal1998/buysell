<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'company_name'=>'required',
            'available_position'=>'required',
            'vacancy_number'=>'required',
            'description'=>'required',
            'job_requirements'=>'required',
            'experience_years'=>'required',
            'tole'=>'required',
            'address'=>'required',
            'city'=>'required',
            'country'=>'required',
            'district'=>'required',
            'province'=>'required',
            'ward_number'=>'required',
            'job_salary'=>'required',
            'working_hours'=>'required',
            'salary_status'=>'required',


        ];
    }
}
