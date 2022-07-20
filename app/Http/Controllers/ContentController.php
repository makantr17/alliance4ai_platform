<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index(Topic $topic){
        // $topic = $topic->discussion()->get();
        return view('contents.create_content', [
            'topic'=> $topic,
        ]);
    }

    public function register(Request $request, Topic $topic){
        $this->validate($request, [
            // 'image'=> 'required',
            'title'=> 'required',
            'description'=> 'required',
        ]);

        // if ($request->hasFile('image')) {
        //    $filename= $request->image->getClientOriginalName();
        //    $request->image->storeAs('images/content/'.$topic->id, $filename,'public');
        // }
           $request->user()->content()->create([
                'topic_id'=> $topic-> id,
                'type'=> '',
                // 'file'=> $filename,
                'link'=> $request->link,
                'title'=> $request->title,
                'description'=> $request->description,
            ]);
        
        return redirect()->route('users.topics.manage', [auth()->user()->name, $topic->id]);
    }

    public function delete(Request $request, User $user, Content $content){
        // $exercises = Exercise::findOrFail($exercise->id);
        $contents = $user->content->where('id', '=', $content->id);
        if ($contents) {
            $content->delete();
        }
        return back();
    }

    public function update(User $user, Content $content){
        return view('contents.update_contents', [
            'content'=> $content
        ]);
    }

    public function updatestore(Request $request, User $user,  Content $content){
        $this->validate($request, [
            'title',
            'description',
        ]);

        DB::table('contents')->where('id', $content->id)->where('user_id',  auth()->user()->id)
            ->update([
            'title'=> $request-> title !== null && $request-> title !== '' ?  $request-> title : $content-> title,
            'description'=> $request-> description !== null && $request-> description !== '' ?  $request-> description : $content-> description,
            'link'=> $request-> link !== null && $request-> link !== '' ?  $request-> link : $content-> link,
        ]);
        return redirect()->route('users.topics.manage', [auth()->user()->name, $content->topic_id]);
    }
    
}
