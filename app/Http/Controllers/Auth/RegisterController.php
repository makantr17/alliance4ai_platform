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
            'email'=> 'required|email|unique:users|max:255',
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
        if (auth()->user()) {
            $request->user()->access_role()->create([
                'is_admin'=>false,
                'grant_user_topic'=>false,
                'grant_user_discussion'=>false,
                'grant_user_circles'=>false,
                'grant_user_learning'=>false,
                'grant_user_hackerthon'=>false,
                'delete_user_topic'=>false,
                'delete_user_discussion'=>false,
                'delete_user_circles'=>false,
                'delete_learning'=>false,
                'delete_hackerthon'=>false,
                'is_root'=>false,
            ]);
        }
        
        return redirect()->route('dashboard');
    }
}
