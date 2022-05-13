<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
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
        return redirect()->back();
    }


    
}
