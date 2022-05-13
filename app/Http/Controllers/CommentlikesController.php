<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class CommentlikesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Message $message, Request $request){
        if ($message->commentlikedBy($request->user())) {
            return response(null, 409);
        }
        $message->likescomment()->create([
            'user_id'=> auth()->user()->id,
        ]);
        return back();
    }

    public function destroy(Message $message, Request $request){
        $request->user()->likescomment()->where('message_id', $message->id)->delete();
        return back();
    }
}
