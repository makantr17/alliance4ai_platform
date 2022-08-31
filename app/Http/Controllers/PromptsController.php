<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Prompts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PromptsController extends Controller
{
    public function index(Topic $topic){
        // $topic = $topic->discussion()->get();
        return view('prompts.create_prompts', [
            'topic'=> $topic,
        ]);
    }

    public function upload(Request $request, Topic $topic){
        $this->validate($request, [
            'question'=> 'required',
        ]);
        $request->user()->prompts()->create([
            'topic_id'=> $topic-> id,
            'question'=> $request->question,
        ]);
        return redirect()->route('users.topics.manage', [auth()->user(), $topic->id]);
    }

    public function delete(Request $request, User $user, Prompts $prompts){
        $prompt = $user->prompts->where('id', '=', $prompts->id);
        if ($prompt) {
            $prompts->delete();
        }
        return back();
    }

    public function update(User $user, Prompts $prompts){
        return view('prompts.update_prompts', [
            'prompt'=> $prompts
        ]);
    }

    public function updatestore(Request $request, User $user,  Prompts $prompts){
        $this->validate($request, [
            'question'=> 'max:255',
        ]);

        DB::table('prompts')->where('id', $prompts->id)->where('user_id',  auth()->user()->id)
            ->update([
            'question'=> $request-> question !== null && $request-> question !== '' ?  $request-> question : $question-> question,
        ]);
        return redirect()->route('users.topics.manage', [auth()->user(), $prompts->topic_id]);
    }


    
}
