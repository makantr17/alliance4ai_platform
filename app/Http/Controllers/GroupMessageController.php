<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic_circle;

class GroupMessageController extends Controller
{

    public function post(Request $request){
        $this->validate($request, [
            'topic_id'=> 'required',
            'message'=> 'required',
        ]);
        $request->user()->groupmessage()->create([
            'user_id'=> $request-> user_id,
            'topic_id'=> $request-> topic_id,
            'message'=> $request-> message,
        ]);

        return redirect()->route('dashboard');
    }
}
