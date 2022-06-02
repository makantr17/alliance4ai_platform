<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index(User $user){
        $admin_access = User::latest()->where('id', $user->id)->with(['access_role']) ->get();
        $alladmins = User::latest()->where('isAdmin', true)->get();
        return view('settings.index', [
            'admin'=> $admin_access,
            'users'=> $alladmins,
        ]);
    }

    public function find(Request $request, User $user){
        $admin_access = User::latest()->where('id', $user->id)->with(['access_role']) ->get(); 
        $this->validate($request, [
            'email'=>'required|email|max:250'
        ]);
        $found = User::latest()->where('email', $request->email)->with(['access_role'])->get();
        if ($found ->count()) {
            return view('settings.grant-admin', [
                'admin'=> $admin_access,
                'userFound'=> $found
            ]);
        }else{
            return back()->with(['status' => 'User not found, enter the right email']);
        }
    }


    public function admin(Request $request, User $user){
        $request-> isAdmin ? DB::table('users')->where('email', $request->email)->update(['isAdmin'=> 1]) 
        : DB::table('users')->where('email', $request->email)->update(['isAdmin'=> 0]);
        return redirect()->route('setting', auth()->user()->name);
    }
}
