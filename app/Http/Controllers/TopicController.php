<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Prompts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

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

    public function destroy(User $user, Topic $topic){
        $topic ->delete();
        return redirect()->route('users.topics',  auth()->user()->name);
    }


    



    public function store(Request $request){

        $data =$request->validate([
            'topic'=> 'required',
            'category'=>'required',
            'questions.*.question' => 'required',
            'exercises.*.question' => 'required',
            'content.*.title' => 'max:300',
            'content.*.link' => 'max:300',
            'content.*.description' => 'max:300',
            // 'content.*.image',
            'content.*.type',
        ]);

        

        // dd($data['content'] );
        $topic= $request->user()->topic()->create([
            'topic'=> $request-> topic,
            'category'=>$request-> category,
            'description'=>$request-> description,
            'status'=> false,
        ]);

        // save the prompts
        foreach ($data['questions'] as $j => $choice_content) {
            $request->user()->prompts()->create([
                'topic_id'=> $topic-> id,
                'question' => implode(", ", $choice_content),
            ]);
        }
        
        // save the exercises
        foreach ($data['exercises'] as $tel => $exercise) {
            $request->user()->exercise()->create([
                'topic_id'=> $topic-> id,
                'question' => implode(", ", $exercise),
            ]);
        }
        // save the contents
        foreach ($data['content'] as $cont => $contento) {
            $title = '';
            $content = '';
            $type = '';
            $filetype='';

            
            
            foreach ($contento as $key => $value) {
                // dd([$key,  $value]);
                if ($value !== 'undefined' && $key === 'title') {
                    $title = $value;
                }
                if ($value !== 'undefined' && $key !== 'title') {
                    $type = $key;
                    $content = $value;
                }
            }
            $request->user()->content()->create([
                'topic_id'=> $topic-> id,
                'type'=> '',
                // 'file'=> $content !== 'undefined' && $type === 'image' ?  $content : '',
                'link'=> $content !== 'undefined' && $type === 'link' ?  $content : '',
                'title'=> $title !== 'undefined' ?  $title : '',
                'description'=> $content !== 'undefined' && $type === 'description' ?  $content : '',
            ]);
        }
        // send notification
        // if ($topic) {
        //     auth()->user()->notify(new \App\Notifications\TopicCreated($topic->topic, $topic->id, auth()->user()));
        // }
        
        return redirect()->route('topics');
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
