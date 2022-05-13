<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view('auth.forgot-password');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email'=> 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }
}
