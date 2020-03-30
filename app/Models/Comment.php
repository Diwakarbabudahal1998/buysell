<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['body'];

    public function user(){
        return $this->belongsTo(App\User::class);
    
    }
    public function reply(){
        return $this->hasMany(App\Models\Reply::class);
    
    }
    public function realestate(){
        return $this->belongsTo(App\Models\Realestate::class);
    
    }
}

