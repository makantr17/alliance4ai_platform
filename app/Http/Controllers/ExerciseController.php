<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function createExercise(Topic $topic)
    {
        $topic = $topic;
        return view('question.create_exercise', [
            'topic' => $topic,
        ]);
    }

    public function upload(Request $request, Topic $topic){
        $this->validate($request, [
            'question'=> 'required',
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
           $filename= $request->image->getClientOriginalName();
           $request->image->storeAs('images/exercise/'.$topic->id, $filename,'public');
        }
        $request->user()->exercise()->create([
            'topic_id'=> $topic-> id,
            'question'=> $request->question,
            'file'=> $filename,
            'link'=> $request->link,
            'title'=> $request->title,
            'description'=> $request->description,
            'start'=> $request->start,
            'end'=> $request->end,
            'is_active'=> $request->is_active,
        ]);

        return redirect()->route('users.topics.manage', [auth()->user(), $topic]  );
    }

    function deleteExercise($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();
        return back();
    }
}
