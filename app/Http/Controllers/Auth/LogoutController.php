<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function store(){
        auth()-> logout();
        // return Redirect::to('https://spendscore.us');
        return redirect()->route('dashboard');
    }

}
