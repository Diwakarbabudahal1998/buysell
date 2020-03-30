<?php

namespace App\Http\Resources\Realestate;

use Illuminate\Http\Resources\Json\Resource;
use App\User;
use App\Models\Comment;
use App\Models\Reply;
class CommentCollection extends Resource
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
            'comment_id'=>$this->id,
            'comment'=> $this->body,
            'time'=>$this->created_at,
            'username'=>User::where('id',$this->user_id)->pluck('name'),
            'replies'=>ReplyCollection::collection(Reply::all()->where('realestate_id',$this->realestate_id)->where('comment_id',$this->id)),

            // 'username'=>$username,
           
        ];  
    }  
}
