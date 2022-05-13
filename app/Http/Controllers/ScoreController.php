<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Topic;
use App\Models\Group;
use App\Models\Course;

class ScoreController extends Controller
{
   

    public function index(User $user){
        
        $count_discussion = Discussion::latest()->count();
        $count_topic = Topic::latest()->count();
        $count_group = Group::latest()->count();
        $count_learning = Course::latest()->count();
        $learning = $user->course()->get();
        $discussion = $user->discussion()->get();
        $topics = $user->topic()->get();
        $groups = $user->group()->get();
        $response = $user->response()->get();
        $commentprompts = $user->commentprompts()->get();
        $joinedCircle = $user->group_member()->get();
        $myCircle = $user->group()->get();

        return view('score.index', [
            'user'=> $user,
            'discussion' => $discussion,
            'topics' => $topics,
            'groups' => $groups,
            'learning'=> $learning,
            'response' => $response,
            'commentprompts' => $commentprompts,
            'joinedCircle' => $joinedCircle,
            'myCircle' => $myCircle,
            'count_discussion' =>$count_discussion,
            'count_topic' =>$count_topic,
            'count_group' =>$count_group,
            'count_learning' =>$count_learning,
        ]);
    }
}
