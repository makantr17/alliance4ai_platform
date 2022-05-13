<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\lessons;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function index(User $user){
        $courses = $user->course()->get();
        return view('course.index', [
            'user' => $user,
            'courses' => $courses
        ]);
    }

    public function manage(User $user, Course $course){
        $lessons = lessons::latest()->where('course_id', '=', $course->id)->where('user_id', '=', $user->id)->get();
        $courses = $user->course()->where('id', '=', $course->id)->get();
        return view('course.manage_courses', [
            'lessons' => $lessons,
            'user'=> $user,
            'course'=> $courses
        ]);
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post ->delete();
        return back();
    }


    public function create(User $user){
        return view('course.create_user',[
            'user' => $user,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'titre'=> 'required',
            'description'=>'required'
        ]);

        
        $request->user()->course()->create([
            'titre'=> $request-> titre,
            'description'=>$request-> description
        ]);
        return redirect()->route('dashboard');
    }


}
