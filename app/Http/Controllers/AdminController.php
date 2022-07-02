<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Hackerthon;
use App\Models\Topic;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index(User $user){
        $discussion = Discussion::where('status', false)->latest()->with(['registeration'])->paginate(3); 
        $hackerthon =  Hackerthon::where('isvalidate', false)->latest()->paginate(3);
        $topics =  Topic::where('status', false)->latest()->paginate(3);
        $admin_access = User::latest()->where('id', $user->id)->with(['access_role']) ->get();
        $alladmins = User::latest()->where('isAdmin', true)->get();
        $course =  Course::where('isvalidate', false)->latest()->paginate(3);
        
        return view('settings.index', [
            'admin'=> $admin_access,
            'users'=> $alladmins,
            'discussions'=> $discussion,
            'hackerthons'=> $hackerthon,
            'topics'=> $topics,
            'courses'=> $course,
        ]);
    }

    public function find(Request $request, User $user){
        $admin_access = User::latest()->where('id', $user->id)->with(['access_role']) ->get(); 
        $this->validate($request, [
            'email'=>'required|email|max:250'
        ]);
        $found = User::latest()->where('email', $request->email)->with(['access_role'])->get();
        if ($found ->count()) {
            return view('settings.grant-admin', [
                'admin'=> $admin_access,
                'userFound'=> $found
            ]);
        }else{
            return back()->with(['status' => 'User not found, enter the right email']);
        }
    }

    public function admin(Request $request, User $user){
        $request-> isAdmin ? DB::table('users')->where('email', $request->email)->update(['isAdmin'=> 0]) 
        : DB::table('users')->where('email', $request->email)->update(['isAdmin'=> 1]);
        return redirect()->route('setting', auth()->user()->name);
    }


    // Saves

    public function saveCourse(Request $request, User $user, Course $course){
        $course-> isvalidate ? DB::table('courses')->where('id', $course->id)->update(['isvalidate'=> 0]) 
        : DB::table('courses')->where('id', $course->id)->update(['isvalidate'=> 1]);
        return redirect()->route('setting', auth()->user()->name);
    }
    public function saveTopic(Request $request, User $user, Topic $topic){
        $topic-> status ? DB::table('topics')->where('id', $topic->id)->update(['status'=> 0]) 
        : DB::table('topics')->where('id', $topic->id)->update(['status'=> 1]);
        return redirect()->route('setting', auth()->user()->name);
    }
    public function saveHackathon(Request $request, User $user, Hackerthon $hackerthon){
        $hackerthon-> isvalidate ? DB::table('hackerthons')->where('id', $hackerthon->id)->update(['isvalidate'=> 0]) 
        : DB::table('hackerthons')->where('id', $hackerthon->id)->update(['isvalidate'=> 1]);
        return redirect()->route('setting', auth()->user()->name);
    }
    public function saveDiscussion(Request $request, User $user, Discussion $discussion){
        $discussion-> status ? DB::table('discussions')->where('id', $topic->id)->update(['status'=> 0]) 
        : DB::table('discussions')->where('id', $discussion->id)->update(['status'=> 1]);
        return redirect()->route('setting', auth()->user()->name);
    }
}
