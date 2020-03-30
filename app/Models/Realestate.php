<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
class Realestate extends Model
{
    protected $fillable = [
        'property_name', 'property_status','property_price','price_status','country','province','district','city'
        ,'ward_number','house_number','zip_code','property_area','number_of_floors',
        'number_of_bedrooms','number_of_bathrooms','building_age','description','gym','garden',
        'swimming_pool','internet','parking','water','school_college_nearby','shopping_nearby','bank_nearby','pitched_road',
        'airport_nearby','sewage','alarm','cctv','ac'
        ];
        public function gallery()
        {
            return $this->hasMany(Gallery::class);
        }
        public function user()
        {
            return $this->belongsto(App\User::class);
        }
        public function comment()
        {
            return $this->hasMany(App\Models\Comment::class);
        }
        public function realestatecategory()
        {
            return $this->hasMany(App\Models\RealestateCategory::class);
        }

}


