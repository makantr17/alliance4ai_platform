<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function like(Request $request, Topic $topic)
    {
        if ($topic->likedBy($request->user())){
            return response(null, 409);
        }
        $topic->likes()->create([
            'user_id'=> auth()->user()->id,
        ]);
        return back();
    }

    public function destroy(Request $request, Topic $topic){
        $request->user()->likes()->where('topic_id', $topic->id)->delete();
        return back();
    }
}
