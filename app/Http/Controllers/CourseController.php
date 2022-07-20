<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policies\CoursePolicy;
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

    public function saveCourseUser(Request $request, User $user, Course $course){
        $request-> checker ? DB::table('courses')->where('id', $course->id)->update(['isvalidate'=> 1]) 
        : DB::table('courses')->where('id', $course->id)->update(['isvalidate'=> 0]);
        return redirect()->route('users.course.manage', [$course->user, $course->id]);
        
    }

    public function destroy(User $user, Course $course){
        $course ->delete();
        return redirect()->route('users.course',  auth()->user()->name);
    }


    public function create(User $user){
        return view('course.create_user',[
            'user' => $user,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required',
            'category'=> 'required',
            'description'=>'required'
        ]);

        $filename='';
        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();
            $request->image->storeAs('images/course/'.$request->name, $filename,'public');
        }
        
        $request->user()->course()->create([
            'name'=> $request-> name,
            'category'=> $request-> category,
            'description'=>$request-> description,
            'images'=> $filename,
            'isvalidate'=>false,
        ]);
        return redirect()->route('users.course',  auth()->user()->name);
    }


    public function update(User $user, Course $course){
        return view('course.update_course', [
            'course'=> $course
        ]);
    }

    public function updatestore(Request $request, User $user, Course $course){
        
        $this->validate($request, [
            'name'=> 'max:255',
            'category',
            'description',
        ]);
        DB::table('courses')->where('id', $course->id)->where('user_id',  auth()->user()->id)
            ->update([
            'name'=> $request-> name !== null && $request-> name !== '' ?  $request-> name : $course-> name,
            'category'=> $request-> category !== null && $request-> category !== '' ?  $request-> category : $course-> category,
            'description'=>$request-> description !== null && $request-> description !== '' ?  $request-> description : $course-> description,
            'isvalidate'=>false,
        ]);

        return redirect()->route('users.course.manage', [auth()->user()->name, $course->id]);
    }


}
