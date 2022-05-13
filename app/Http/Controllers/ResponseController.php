<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Response;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function post(Request $request){
        $this->validate($request, [
            'exercise_id'=> 'required',
            'answer'=> 'required',
        ]);
        $filename = "";
        if ($request->hasFile('image')) {
           $filename= $request->image->getClientOriginalName();
           $request->image->storeAs('images/exercise/'.$request-> exercise_id, $filename,'public');
        }
        $request->user()->response()->create([
            'user_id'=> $request-> user_id,
            'exercise_id'=> $request-> exercise_id,
            'answer'=> $request-> answer,
            'link'=> $request-> link,
            'file'=> $filename,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Response $response){
        
        $this->authorize('delete', $response);
        $response->delete();

        return back();
    }
}
