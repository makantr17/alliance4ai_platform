<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function takecourse(Request $request, Course $course){
        $request->user()->usercourse()->create([
            'course_id'=> $course-> id,
            'user_id'=> auth()->user()-> id,
        ]);
        return redirect()->back();
    }
}
