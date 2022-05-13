<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Message $message, Request $request){

        $message->likescomment()->create([
            'user_id'=> auth()->user()->id,
        ]);
        return back();
    }

    // public function likescomment(Request $request, Message $message)
    // {
    //     if ($message->likedcommentBy($request->user())){
    //         return response(null, 409);
    //     }
    //     $message->likescomment()->create([
    //         'user_id'=> auth()->user()->id,
    //     ]);
    //     return back();
    // }

    // public function destroycomment(Request $request, Message $message){
    //     $request->user()->likescomment()->where('message_id', $message->id)->delete();
    //     return back();
    // }
}
