<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        
        // validate
        $this->validate($request, [
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'password'=> 'required|confirmed',
            'country'=> 'required|max:255',
            'city'=> 'required|max:255',
            'address'=> 'required|max:255',
            'phone'=> 'required|max:255',
            'age'=> 'required',
            'gender'=> 'required|max:255',
            'profession'=>'required|max:255'
        ]);
        // dd($request->email);
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'country'=> $request->country,
            'city'=> $request->city,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'age'=> $request->age,
            'gender'=>$request->gender,
            'profession'=> $request->profession,
            'isAdmin'=>false
        ]);

        // sign user
        auth()-> attempt($request-> only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
