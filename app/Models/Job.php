<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable=[
        'company_name','available_position','vacancy_number','description','experience_years','job_requirements',
        'tole','address','city','district','province','ward_number','job_salary','salary_status','working_hours',
        'gym','health','lunch','vehicle_status','device','featured','country'

        ];
}
