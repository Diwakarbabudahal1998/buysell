<?php

namespace App\Http\Resources\Realestate;

use Illuminate\Http\Resources\Json\Resource;
use App\User;
use App\Models\Comment;

class ReplyCollection extends Resource
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
            // 'comment'=>Comment::where('id',$this->comment_id)->pluck('id'),
            'reply'=> $this->reply,
            'time'=>$this->created_at,
            'username'=>User::where('id',$this->user_id)->pluck('name'),
        ]; 
    }
}
