<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Message;

class MessageController extends Controller
{

    public function post(Request $request){
        $this->validate($request, [
            'topic_id'=> 'required',
            'message'=> 'required',
        ]);
        $request->user()->message()->create([
            'user_id'=> $request-> user_id,
            'topic_id'=> $request-> topic_id,
            'message'=> $request-> message,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Message $message){
        
        $this->authorize('delete', $message);
        $message->delete();

        return back();
    }
}
// App\Models\Group::factory()->times(20)->create(['user_id'=>1]);