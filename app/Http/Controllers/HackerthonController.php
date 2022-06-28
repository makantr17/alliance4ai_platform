<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hackerthon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HackerthonController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function index(User $user){
        $hackerthon = $user->hackerthon()->get();
        return view('hackerton.index', [
            'user' => $user,
            'hackerthons' => $hackerthon
        ]);
    }

    public function manage(User $user, Hackerthon $hackerthon){
        // $hackerthon = $user->hackerthon()->where('id', '=', $hackerthon->id)->get();
        return view('hackerton.manage_hackerton', [
            'user'=> $user,
            'hackerthon'=> $hackerthon,
        ]);
    }

    public function create(User $user){
        $hackerthon = $user->hackerthon()->get();
        return view('hackerton.create_hackerthon', [
            'user'=> $user,
            'hackerthons'=> $hackerthon,
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'title'=> 'required',
            'category'=> 'required',
            'subtitle1'=> 'required',
            'description1'=> 'required',
            'instructions'=> 'required',
            'start_date'=> 'required',
            'deadline'=> 'required',
        ]);
        
        $filename='';
        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();
            $request->image->storeAs('images/hackathon/'.$request->title, $filename,'public');
        }
        $hackerthon = $request->user()->hackerthon()->create([
            'title'=> $request-> title,
            'category'=> $request-> category,
            'subtitle1'=> $request-> subtitle1,
            'description1'=> $request-> description1,
            'subtitle2'=> $request-> subtitle2,
            'description2'=> $request-> description2,
            'images'=> $filename,
            'instructions'=> $request-> instructions,
            'evaluation'=> $request-> evaluation,
            'rules'=> $request-> rules,
            'limit_group'=> $request-> limit_group,
            'first_prize'=> $request-> first_prize,
            'second_prize'=> $request-> second_prize,
            'third_prize'=> $request-> third_prize,
            'start_date'=> $request-> start_date,
            'deadline'=> $request-> deadline,
            'link1'=> $request-> link1,
            'link2'=> $request-> link2,
            'isvalidate'=>false,
        ]);

        if ($hackerthon) {
            auth()->user()->notify(new \App\Notifications\HackathonCreated($hackerthon->title, $hackerthon->id));
        }

        return redirect()->route('hackathons');
    }

    public function update(Hackerthon $hackerthon){
        return view('hackerton.edit_hackerthon', [
            'hackerthon'=> $hackerthon
        ]);
    }


}
