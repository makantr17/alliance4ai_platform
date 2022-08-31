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

    public function competitors(User $user, Hackerthon $hackerthon){
        $hackerthons = Hackerthon::latest()->where('id', '=', $hackerthon->id)->with(['competitors'])->get();
        return view('hackerton.manage_competitor', [
            'user'=> $user,
            'hackerthon'=> $hackerthons,
        ]);
    }

    public function create(User $user){
        $hackerthon = $user->hackerthon()->get();
        return view('hackerton.create_hackerthon', [
            'user'=> $user,
            'hackerthons'=> $hackerthon,
        ]);
    }

    public function destroy(User $user, Hackerthon $hackerthon){
        $hackerthon ->delete();
        return redirect()->route('users.hackerthon',  auth()->user());
    }


    public function store(Request $request){
        $this->validate($request, [
            'title'=> 'required|unique:hackerthons',
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

        // if ($hackerthon) {
        //     auth()->user()->notify(new \App\Notifications\HackathonCreated($hackerthon->title, $hackerthon->id));
        // }

        return redirect()->route('hackathons');
    }


    public function updatestore(Request $request, User $user, Hackerthon $hackerthon){
        $this->validate($request, [
            'title'=> 'unique:hackerthons',
            'category',
            'subtitle1',
            'description1',
            'instructions',
            'start_date',
            'deadline',
        ]);

        DB::table('hackerthons')->where('id', $hackerthon->id)->where('user_id',  auth()->user()->id)
            ->update([
            'title'=> $request-> title !== null && $request-> title !== '' ?  $request-> title : $hackerthon-> title,
            'category'=> $request-> category !== null && $request-> category !== '' ?  $request-> category : $hackerthon-> category,
            'subtitle1'=>$request-> subtitle1 !== null && $request-> subtitle1 !== '' ?  $request-> subtitle1 : $hackerthon-> subtitle1,
            'subtitle2'=>$request-> subtitle2 !== null && $request-> subtitle2 !== '' ?  $request-> subtitle2 : $hackerthon-> subtitle2,
            'description1'=>$request-> description1 !== null && $request-> description1 !== '' ?  $request-> description1 : $hackerthon-> description1,
            'description2'=>$request-> description2 !== null && $request-> description2 !== '' ?  $request-> description2 : $hackerthon-> description2,
            'isvalidate'=>false,
            'instructions'=>$request-> instructions !== null && $request-> instructions !== '' ?  $request-> instructions : $hackerthon-> instructions,
            'evaluation'=>$request-> evaluation !== null && $request-> evaluation !== '' ?  $request-> evaluation : $hackerthon-> evaluation,
            'limit_group'=>$request-> limit_group !== null && $request-> limit_group !== '' ?  $request-> limit_group : $hackerthon-> limit_group,
            'start_date'=>$request-> start_date !== null && $request-> start_date !== '' ?  $request-> start_date : $hackerthon-> start_date,
            'deadline'=>$request-> deadline !== null && $request-> deadline !== '' ?  $request-> deadline : $hackerthon-> deadline,
            'link1'=>$request-> link1 !== null && $request-> link1 !== '' ?  $request-> link1 : $hackerthon-> link1,
            'link2'=>$request-> link2 !== null && $request-> link2 !== '' ?  $request-> link2 : $hackerthon-> link2,
            'first_prize'=>$request-> first_prize !== null && $request-> first_prize !== '' ?  $request-> first_prize : $hackerthon-> first_prize,
            'second_prize'=>$request-> second_prize !== null && $request-> second_prize !== '' ?  $request-> second_prize : $hackerthon-> second_prize,
            'third_prize'=>$request-> third_prize !== null && $request-> third_prize !== '' ?  $request-> third_prize : $hackerthon-> third_prize,
        ]);

        return redirect()->route('users.hackerthon',  auth()->user());
    }

    public function update(Hackerthon $hackerthon){
        return view('hackerton.edit_hackerthon', [
            'hackerthon'=> $hackerthon
        ]);
    }


}
