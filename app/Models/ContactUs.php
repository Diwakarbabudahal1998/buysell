<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class ContactUs extends Model
{
    protected $fillable =[
        'email','name','subject','message','user_id'
    ];
}