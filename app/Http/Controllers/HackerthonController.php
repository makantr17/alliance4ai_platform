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
        $hackerthon = $user->hackerthon()->where('id', '=', $hackerthon->id)->get();
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
            'titre'=> 'required',
            'category'=> 'required',
            'description'=> 'required',
            'instructions'=> 'required',
            'tasks'=> 'required',
            'limit_group'=> 'required',
        ]);

        $request->user()->hackerthon()->create([
            'titre'=> $request-> titre,
            'category'=> $request-> category,
            'description'=> $request-> description,
            'instructions'=> $request-> instructions,
            'tasks'=> $request-> tasks,
            'limit_group'=> $request-> limit_group,
            'isavailable'=>false,
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Hackerthon $hackerthon){
        return view('hackerton.edit_hackerthon', [
            'hackerthons'=> $hackerthon
        ]);
    }


}
