<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\lessons;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
   
    public function index(User $user){
        $courses = $user->course()->get();
        return view('lessons.create_lesson', [
            'user'=> $user,
            'course'=> $courses
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

    public function update(lessons $lesson){
        return view('lessons.update_lesson', [
            'lesson'=> $lesson
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'course_id'=> 'required',
            'title'=> 'required',
            'content'=>'required',
            'estimate_time'=>'required'
        ]);

        
        $request->user()->lessons()->create([
            'course_id'=> $request-> course_id,
            'title'=> $request-> title,
            'content'=>$request-> content,
            'status'=>false,
            'link'=> $request-> link,
            'estimate_time'=>$request-> estimate_time,
            
        ]);

        return redirect()->route('dashboard');
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
