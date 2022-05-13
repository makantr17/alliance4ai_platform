<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index(User $user){
        $discussions = $user->discussion()->get();
        return view('topics.create_topic', [
            'user'=> $user,
            'discussion'=> $discussions
        ]);
    }

    public function adminTopics(User $user){
        $topics = Topic::latest()->with(['content', 'likes', 'message'])->where('user_id', '=', $user->id)->get();
        // $topics = Topic::latest()->where('discussion_id', '=', $discussion->id)->where('user_id', '=', $user->id)->get();
        // $discussions = $user->discussion()->where('id', '=', $discussion->id)->get();
        return view('topics.topic_admin', [
            'topics' => $topics,
        ]);
    }

    public function manage(User $user, Topic $topic){
        $topic = $user->topic()->where('id', '=', $topic->id)->with(['content','prompts', 'exercise', 'likes', 'message'])->get();
        // $questions = $topic->questions()->paginate(10);
        return view('topics.topic_manage', [
            'topics' => $topic,
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'topic'=> 'required',
            'category'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();
            $request->image->storeAs('images/topic/'.$request-> topic, $filename,'public');
            $request->user()->topic()->create([
                'topic'=> $request-> topic,
                'category'=>$request-> category,
                'description'=>$request-> description,
                'status'=> false,
                'image'=> $filename,
            ]);
            return redirect()->route('topics');
        }

    }


    public function update(Topic $topic){
        return view('topics.update_topic', [
            'topic'=> $topic
        ]);
    }

    public function updatestore(Request $request, lessons $lesson){
        $this->validate($request, [
            'title'=> 'required',
            'content'=>'required',
            'estimate_time'=>'required'
        ]);

        DB::table('lessons')->where('id', $lesson->id)->where('user_id', $lesson->user_id)->where('course_id', $lesson->course_id)
            ->update([
            'title'=> $request-> title,
            'content'=>$request-> content,
            'status'=>false,
            'link'=> $request-> link,
            'estimate_time'=>$request-> estimate_time,
            
        ]);

        return redirect()->route('dashboard');
    }
}
