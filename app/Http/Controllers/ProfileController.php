<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(User $user){
        $admin_access = User::latest()->where('id', $user->id)->with(['access_role']) ->get();
        return view ('users.profile',[
            'user' => $user,
            'admin' => $admin_access,
        ]);
    }

    public function upload(Request $request){
        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();
            if (auth()->user()->image) {
                 Storage::delete('/public/images/'.auth()->user()->id.'/'.auth()->user()->image);
            }
            $request->image->storeAs('images/'.auth()->user()->id, $filename,'public');
            auth()->user()->update(['image'=> $filename]);
         }
 
         return redirect()->back();
    }


    public function update(User $user){
        $admin_access = User::latest()->where('id', $user->id)->with(['access_role']) ->get();
        return view ('users.update-profile',[
            'user' => $user,
            'admin' => $admin_access,
        ]);
    }


    public function store(Request $request){
        // validate
        $this->validate($request, [
            'name'=> 'required| max:255',
            'email'=> 'required|email|max:255',
            'age'=> 'required',
            'country'=> 'required|max:255',
            'city'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'profession'=>'required'
            
        ]);
        

        DB::table('users')->where('email', auth()->user()->email)->where('password',  auth()->user()->password)
            ->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'age'=> $request->age,
                'country'=> $request->country,
                'city'=> $request->city,
                'address'=> $request->address,
                'phone'=>$request->phone,
                'gender'=> $request->gender,
                'profession'=> $request->profession,
        ]);

        auth()-> logout();
        return redirect()->route('learning');
    }
}
