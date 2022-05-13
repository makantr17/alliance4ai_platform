<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class GroupMemberController extends Controller
{
    public function add(Group $group){
        $users = User::latest()->get();
        $user = $group->user()->get();
      
        return view('groups.add_member', [
            'user'=> $user,
            'allusers'=> $users,
            'group'=> $group
        ]);
    }

    public function adduser(Request $request, Group $group){
        // $this->validate($request, [
        //     'user_id'=> 'required',
        // ]);
        dd($request->email);

        $request->user()->group_member()->create([
            'group_id'=> $group-> id,
            'user_id'=> $group-> user_id,
        ]);

        return redirect()->route('dashboard');
    }
}
