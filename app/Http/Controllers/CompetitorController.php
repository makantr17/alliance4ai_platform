<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hackerthon;

class CompetitorController extends Controller
{
    
    public function adduser(Request $request, Hackerthon $hackerthon){
        $request->user()->competitors()->create([
            'hackerthon_id'=> $hackerthon-> id,
            'user_id'=> auth()->user()->id,
        ]);

        return redirect()->back();
    }
}


