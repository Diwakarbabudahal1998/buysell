<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=['reply'];
    public function user()
    {
        return $this->belongsTo(App\User::class);
    }

    public function comment()
    {
        return $this->belongsTo(App\Models\Comment::class);
    }
}
