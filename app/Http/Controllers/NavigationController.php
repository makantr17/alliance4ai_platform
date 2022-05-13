<?php

namespace App\Http\Controllers;

use \Carbon;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Discussion;
use App\Models\lessons;
use App\Models\Topic;
use App\Models\Message;
use App\Models\Group;
use App\Models\User;
use App\Models\Content;
use App\Models\Prompts;
use App\Models\Question;
use App\Models\Exercise;
use App\Models\Group_member;
use App\Models\Hackerthon;
use App\Models\Topic_circle;
use App\Models\group_message;


class NavigationController extends Controller
{
    public function community(){
        $users =  User::latest()->get();
        return view('wp.community', [
            'users'=> $users,
        ]);
    }

    public function topics(){
        $topics =  Topic::latest()->get();
        $topic = Topic::when(request('category'), function($query){
            return $query->where('category', request('category'));
        })->get();
        return view('topics.index', [
            'topics'=> $topic,
        ]);
    }

    public function topicsDetails(Topic $topic){
        $topics = Topic::latest()->where('id', '=', $topic->id)->with(['content', 'prompts', 'exercise', 'likes', 'message'])->get();
        
        return view('topics.topic_details', [
            'topics' => $topics,
        ]);
    }

    public function promptDetails(Prompts $prompts){
        $prompt = Prompts::latest()->where('id', '=', $prompts->id)-> with(['commentprompts', 'topic'])->get();
        return view('topics.prompt_manage', [
            'prompts' => $prompt,
        ]);
    }




    public function takeQuiz(Exercise $exercise){
        return view('topics.take_quiz', [
            'exercise' => $exercise,
        ]);
    }

    public function contentsDetails(Content $content){
        $content = Content::latest()->where('id', '=', $content->id)-> with(['commentfiles', 'topic'])->get();
        return view('topics.topic_element', [
            'contents' => $content,
        ]);
    }


    

    public function themes(){
        return view('wp.theme_discussion');
    }

    public function discussion(){
        if(request('period') != ''){
            $mytime = Carbon\Carbon::now();
            $start = $mytime->toDateString();
            $time = $mytime->toTimeString();
            if (request('period') === 'Future Discussion') {
                $discussion = Discussion::where('date','>=',$start)
                    ->orwhere('date','=',$start)-> where(function($query){
                        $query->whereDate('end_time','>=',$time);
                    })->get();

            }elseif (request('period') === 'Past Discussion') {
                $discussion = Discussion::whereDate('date','<=',$start)
                ->where('start_time','<=',$time)
                ->get();
            }elseif (request('period') === 'Ongoing Discussion') {
                $discussion = Discussion::whereDate('date','=',$start)
                ->where('start_time','<=',$time)
                ->get();
            }else {
                # code...
            }
            
        }else{
            $discussion = Discussion::when(request('category'), function($query){
                return $query->where('category', request('category'));
            })->latest()->get(); 
        }
        return view('wp.discussion', [
            'discussion'=> $discussion,
        ]);
    }

    public function groups(){
        if(request('search') != ''){
            $groups = Group::where('name', 'LIKE', '%'.request('search').'%')->with(['group_member'])->latest()->get();;
        }else{
            $groups = Group::when(request('location'), function($query){
                return $query->where('location', request('location'));
            })->with(['group_member'])->latest()->get();
        }
        $location =  Group::distinct()->get(['location']);
        return view('wp.grouped', [
            'group'=> $groups,
            'location'=> $location,
        ]);
    }

    public function circle_details(Group $group){
        $group_member = Group_member::latest()->where('group_id', '=', $group->id)->get();
        $group = Group::latest()->where('id', '=', $group->id)->get();
        return view('wp.circle_details', [
            'group' => $group,
            'group_members'=> $group_member
        ]);
    }
    
    public function learning(){
        $course =  Course::latest()->get();
        return view('wp.learning', [
            'course'=> $course,
        ]);
    }

    public function hackathons(){
        $hackerthon =  Hackerthon::latest()->get();
        return view('wp.hackathon', [
            'hackerthons'=> $hackerthon,
        ]);
    }

    public function details(Hackerthon $hackerthon){
        $hackerthon = Hackerthon::latest()->where('id', '=', $hackerthon->id)->get();
        return view('wp.hackathon_details', [
            'hackerthon' => $hackerthon,
        ]);
    }
    public function hackathon_participants(Hackerthon $hackerthon){
        $hackerthons = Hackerthon::latest()->where('id', '=', $hackerthon->id)->with(['competitors'])->get();
        return view('hackerton.competitors', [
            'hackerthon' => $hackerthons,
        ]);
    }

    public function group_member(Group $group){
        $group_member = Group_member::latest()->where('group_id', '=', $group->id)->get();
        $groups = Group::latest()->where('id', '=', $group->id)->get();
        $discussion = Discussion::latest()->get();
        // explode()
        return view('wp.group_member', [
            'group' => $groups,
            'group_members'=> $group_member,
            'discussions' => $discussion,
        ]);
    }


    public function group_topic_message(Topic_circle $topic_circle){
        $group_members = Group_member::latest()->where('group_id', '=', $topic_circle->group_id)->get();
        $messages = group_message::latest()->where('topic_id', '=', $topic_circle-> id)->get();
        $groups = Group::latest()->where('id', '=', $topic_circle-> group_id)->get();
        return view('circle.topicmessage', [
            'discussions' => $topic_circle,
            'group_members' => $group_members,
            'messages'=> $messages,
            'group' => $groups,
        ]);
    }


    public function circle_topic_message(Request $request, Topic_circle $topic_circle){
        $group_members = Group_member::latest()->where('group_id', '=', $topic_circle->group_id)->get();
        $messages = group_message::latest()->where('topic_id', '=', $topic_circle-> id)->get();
        $groups = Group::latest()->where('id', '=', $topic_circle-> group_id)->get();
        $request->user()->groupmessage()->create([
            'user_id'=> auth()->user()->id,
            'topic_id'=> $topic_circle-> id,
            'message'=> $request-> message,
        ]);
        return back();
    }


    public function join_member(Request $request, Group $group){
        $group_member = Group_member::latest()->where('group_id', '=', $group->id)->where('user_id', '=', auth()->user()->id)->get();
        if ($group_member -> count()) {
            return back();
        }
        else {
            $request->user()->group_member()->create([
                'group_id'=> $group-> id,
                'user_id'=> auth()->user()->id,
            ]);
        }
        return redirect()->route('groups.members', [$group->id]);
    }



    
    public function course_details(Course $course){
        $lessons = lessons::latest()->where('course_id', '=', $course->id)->get();
        $courses = Course::latest()->where('id', '=', $course->id)->get();
        
        return view('wp.course_single', [
            'lessons' => $lessons,
            'course'=> $courses
        ]);
    }

    public function lesson_details(lessons $lesson){
        return view('lessons.load_lesson', [
            'lessons' => $lesson,
        ]);
    }

    public function discussion_details(Discussion $discussion){
        return view('wp.discussion_single', [
            'discussion'=> $discussion
        ]);
    }


    public function topic_discussion(Discussion $discussion, Topic $topic){
        $discussions = $topic->discussion()->get();
        $messages = $topic->message()->latest()->get();
        $topics = Topic::with(['user','likes'])->where('id', '=', $topic->id)->get();
        return view('wp.topic_discussion', [
            'message'=> $messages,
            'topic' => $topics,
            'discussion'=> $discussions
        ]);
    }

    

    public function comment_topic(Request $request, Topic $topic){
        $request->user()->message()->create([
            'user_id'=> auth()->user()->id,
            'topic_id'=> $topic-> id,
            'message'=> $request-> message,
        ]);
        return redirect()->route('discussion.topic.messages', [$topic->id]);
    }


}
