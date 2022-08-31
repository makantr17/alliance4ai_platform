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
            'groups'=> $group
        ]);
    }

    public function adduser(Request $request, Group $group){
        $this->validate($request, [
            'peoples'=> 'required',
        ]);
        
        $inviteusers = [];
        if ($request-> peoples) {
            $list = explode(',', $request-> peoples);
            for ($i=0; $i < sizeof($list) ; $i++) { 
                array_push($inviteusers, (User::latest()->where('email', '=', $list[$i])->get())[0]);
            }
        }
        foreach ($inviteusers as $key => $value) {
            $value->notify(new \App\Notifications\SendInvitation($group->name, $group->id, auth()->user()->name));
        }
       

        return redirect()->route('users.group.manage', [auth()->user(), $group->id]);
    }

    public function inviteuser(Request $request, Group $group){
        // $this->validate($request, [
        //     'user_id'=> 'required',
        // ]);
        dd('hello here');

        $request->user()->group_member()->create([
            'peoples'=>$request-> peoples,
            'group_id'=> $group-> id,
            'user_id'=> $group-> user_id,
        ]);

        return redirect()->route('dashboard');
    }
}
