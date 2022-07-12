<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Topic;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DiscussionController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function index(User $user){
        $discussion = $user->discussion()->get();
        return view('discussion.index', [
            'user' => $user,
            'discussions' => $discussion
        ]);
    }

    public function destroy(User $user, Discussion $discussion){
        $discussion ->delete();
        return redirect()->route('users.discussion',  auth()->user()->name);
    }

    public function add_cover(Discussion $discussion){
        return view('discussion.add_cover', [
            'discussions' => $discussion
        ]);
    }
    public function upload(Request $request, Discussion $discussion){
        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();
            if ($discussion->files) {
                 Storage::delete('/public/images/discussion/'.$discussion->id.'/'.$discussion->files);
            }
            $request->image->storeAs('images/discussion/'.$discussion->id, $filename,'public');
            Discussion::where('id', $discussion->id)
                ->update(['files'=> $filename]);
         }
         return redirect()->route('users.discussion', auth()->user()->name);
    }

    public function manage(User $user, Discussion $discussion){
        $topics = [];
        if ($discussion->topics ) {
            $list = explode(',', $discussion->topics);
            $topics = Topic::latest()->where('id', '=', $list[0])->get();
        }
        
        return view('discussion.manage_discussion', [
            'discussion'=> $discussion,
            'topics'=> $topics,
        ]);
    }

    public function create(User $user){
        $users =  User::latest()->get();
        $groups =  Group::latest()->get();
        $topics =  Topic::latest()->get();
        return view('discussion.create_discussion',[
            'user' => $user,
            'listofusers' => $users,
            'listofgroups' => $groups,
            'listoftopics' => $topics,
        ]);
    }



    public function store(Request $request){
        $this->validate($request, [
            'title'=> 'required|unique:discussions|max:255',
            'category'=> 'required|max:255',
            'description'=>'max:200',
            'location'=>'required',
            'admin_1'=>'required',
            'date'=>'required|date|after:yesterday',
            'start_time'=>'required',
            'end_time'=>'required|after:start_time',
            'peoples',
            
        ]);

        $discussion =$request->user()->discussion()->create([
            'title'=> $request-> title,
            'category'=> $request-> category,
            'description'=>$request-> description,
            'status'=>false,
            'location'=>$request-> location,
            'admin_1'=>$request-> admin_1,
            'start_time'=>$request-> start_time,
            'end_time'=>$request-> end_time,
            'link'=>$request-> link,
            'peoples'=>$request-> peoples,
            'groups'=>$request-> groups,
            'topics'=>$request-> topics,
            'date'=>$request-> date,
        ]);
        // if ($discussion) {
        //     auth()->user()->notify(new \App\Notifications\DiscussionCreated($request->title, $discussion->id,
        //     $request->start_time, $request->end_time, auth()->user()->name, $request->link));
        // }
        
        return redirect()->route('users.discussion',  auth()->user()->name);
    }
}
