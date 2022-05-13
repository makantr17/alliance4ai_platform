<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserMessageController extends Controller
{
    public function index(User $user){
        $messages = $user->message()->with(['user', 'likescomment'])->paginate(20);
        return view('users.message_discussion', [
            'user' => $user,
            'message'=> $messages,
        ]);
    }
}
