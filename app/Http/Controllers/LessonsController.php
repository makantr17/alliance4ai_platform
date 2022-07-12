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
   
    public function index(User $user, Course $course){
        // $courses = $user->course()->get();
        return view('lessons.create_lesson', [
            'user'=> $user,
            'course'=> $course
        ]);
    }

    public function details(User $user, lessons $lesson){
        // $courses = $user->course()->get();
        return view('lessons.lesson_details', [
            'user'=> $user,
            'lesson'=> $lesson
        ]);
    }

    public function destroy(User $user, lessons $lesson){
        $lesson ->delete();
        return redirect()->route('users.course',  auth()->user()->name);
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


    public function store(Request $request, User $user, Course $course){
        $this->validate($request, [
            'title'=> 'required',
            'description'=>'required',
            'content'=>'required',
            'subtitle1'=>'required',
            'description1'=>'required',
            
        ]);
        
        $request->user()->lessons()->create([
            'course_id'=> $course->id,
            'title'=> $request-> title,
            'description'=>$request-> description,
            'content'=>$request-> content,
            'subtitle1'=> $request-> subtitle1,
            'description1'=>$request-> description1,
            'code1'=>$request-> code1,
            'link1'=>$request-> link1,
            'subtitle2'=>$request-> subtitle2,
            'description2'=>$request-> description2,
            'code2'=>$request-> code2,
            'link2'=>$request-> link2,
            'subtitle3'=>$request-> subtitle3,
            'description3'=>$request-> description3,
            'code3'=>$request-> code3,
            'link3'=>$request-> link3,
            'status'=>false,
        ]);

        return redirect()->route('users.course',  auth()->user()->name);
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
