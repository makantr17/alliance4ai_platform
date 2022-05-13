<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prompts;
use App\Models\CommentPromts;

class CommentPromptsController extends Controller
{
    public function post(Request $request){
        $this->validate($request, [
            'prompts_id'=> 'required',
            'message'=> 'required',
        ]);
        $request->user()->commentprompts()->create([
            'user_id'=> $request-> user_id,
            'prompts_id'=> $request-> prompts_id,
            'message'=> $request-> message,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(CommentPromts $commentprompts){
        
        $this->authorize('delete', $commentprompts);
        $commentprompts->delete();

        return back();
    }
}
