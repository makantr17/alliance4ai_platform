<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class TopicCircleController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function indexcircle(Group $group){
        return view('circle.create_circletopic', [
            'groups'=> $group,
        ]);
    }

    public function storecircle(Request $request, Group $group){
      
        $this->validate($request, [
            'description'=> 'required',
            'title'=>'required',
            'category'=>'required',
            'type'=>'required',
            'content'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

        
        $request->user()->topiccircle()->create([
            'group_id'=> $group->id,
            'description'=> $request-> description,
            'title'=> $request-> title,
            'type'=>$request-> type,
            'category'=>$request-> category,
            'content'=>$request-> content,
            'start_time'=>$request-> start_time,
            'end_time'=>$request-> end_time,
            'status'=>false,
        ]);

        return redirect()->route('dashboard');
    }
}
