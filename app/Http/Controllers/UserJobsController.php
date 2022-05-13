<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_jobs;

class UserJobsController extends Controller
{
    public function index(User $user){
        $jobs = $user->user_jobs()->get();
        return view('jobs.index', [
            'user'=> $user,
            'user_jobs'=> $jobs,
        ]);
    }
    public function manage(User $user, user_jobs $user_jobs){
        $user_job = $user->user_jobs()->get();
        // $groups = $user->group()->where('id', '=', $group->id)->get();
       
        return view('jobs.manage_jobs', [
            'user'=> $user,
            'user_jobs'=>$user_job
        ]);
    }

    public function addjob(User $user){
        $jobs = $user->user_jobs()->get();
        return view('jobs.add_job', [
            'user'=> $user,
            'user_jobs'=> $jobs,
        ]);
    }

    public function storejob(Request $request){
        $this->validate($request, [
            'titre'=> 'required',
            'description'=> 'required',
            'requirements'=> 'required',
            'links'=> 'required',
            'finished_at'=> 'required',
        ]);

        $request->user()->user_jobs()->create([
            'titre'=> $request-> titre,
            'description'=> $request-> description,
            'requirements'=> $request-> requirements,
            'links'=> $request-> links,
            'finished_at'=> $request-> deadline,
        ]);

        return redirect()->route('dashboard');
    }
}
