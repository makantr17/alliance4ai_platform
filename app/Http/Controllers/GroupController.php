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
    public function destroy(User $user, Group $group){
        $group ->delete();
        return redirect()->route('users.group',  auth()->user());
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required|unique:groups',
            'location'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,gif',
        ]);
       
        if ($request->hasFile('image')) {
            $filename= $request->image->getClientOriginalName();

            $request->image->storeAs('images/group/'.$request->name, $filename,'public');
            $circle = $request->user()->group()->create([
                'name'=> $request-> name,
                'description'=>$request-> description,
                'location'=>$request-> location,
                'image'=>$filename,
                'isavailable'=>false,
            ]);
            // circle notification
            // if ($circle) {
            //     auth()->user()->notify(new \App\Notifications\CircleCreated($circle->titre, $circle->id));
            // }

            return redirect()->route('users.group',  auth()->user());
         }

        return redirect()->back();
    }

    public function manage(User $user, Group $group){
        $groups = $user->group()->where('id', '=', $group->id)->with(['group_member']) ->get();
        
        return view('groups.manage_group', [
            'user'=> $user,
            'group'=> $groups,
        ]);
    }


    public function update(User $user, Group $group){
        return view('groups.edit_group', [
            'groups'=> $group
        ]);
    }


    public function updatestore(Request $request, User $user, Group $group){
        $this->validate($request, [
            'description'=>'max:300',
        ]);

        DB::table('groups')->where('id', $group->id)->where('user_id',  auth()->user()->id)
            ->update([
            // 'name'=> $request-> name !== null && $request-> name !== '' ?  $request-> name : $group-> name,
            // 'titre'=> $request-> titre !== null && $request-> titre !== '' ?  $request-> titre : $group-> titre,
            // 'limit'=> $request-> limit !== null && $request-> limit !== '' ?  $request-> limit : $group-> limit,
            'location'=> $request-> location !== null && $request-> location !== '' ?  $request-> location : $group-> location,
            'description'=>$request-> description !== null && $request-> description !== '' ?  $request-> description : $group-> description,
        ]);

        return redirect()->route('users.group.manage', [auth()->user(), $group->id]);
    }
}