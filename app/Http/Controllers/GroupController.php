<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Group_member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function index(User $user){
        $groups = $user->group()->get();
        return view('groups.index', [
            'user' => $user,
            'groups' => $groups
        ]);
    }

    public function create(User $user){
        return view('groups.create_group',[
            'user' => $user,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required',
            'titre'=> 'required',
            'description'=>'required',
            'location'=>'required',
            'image'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();
            $request->image->storeAs('images/group/'.$request->name, $filename,'public');
            $request->user()->group()->create([
                'name'=> $request-> name,
                'titre'=> $request-> titre,
                'description'=>$request-> description,
                'location'=>$request-> location,
                'limit'=>$request-> limit,
                'image'=>$filename,
                'isavailable'=>false,
            ]);
            return redirect()->route('users.group',  auth()->user()->name);
         }

        return redirect()->back();
    }

    public function manage(User $user, Group $group){
        $group_member = $user->group_member()->get();
        $groups = $user->group()->where('id', '=', $group->id)->get();
       
        return view('groups.manage_group', [
            'user'=> $user,
            'group'=> $groups,
            'group_members'=>$group_member
        ]);
    }
}
