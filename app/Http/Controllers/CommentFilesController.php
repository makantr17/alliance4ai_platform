<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Content;
use App\Models\CommentFiles;

class CommentFilesController extends Controller
{
    public function post(Request $request){
        $this->validate($request, [
            'content_id'=> 'required',
            'message'=> 'required',
        ]);
        $request->user()->commentfiles()->create([
            'user_id'=> $request-> user_id,
            'content_id'=> $request-> content_id,
            'message'=> $request-> message,
        ]);

        return redirect()->back();
    }

    public function destroy(CommentFiles $commentfiles){
        
        $this->authorize('delete', $commentfiles);
        $commentfiles->delete();

        return back();
    }
}
