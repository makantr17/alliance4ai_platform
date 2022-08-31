<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Exercise;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function createExercise(User $user, Topic $topic)
    {
        return view('question.create_exercise', [
            'topic' => $topic,
            'user'
        ]);
    }

    public function register(Request $request, User $user, Topic $topic){
        $this->validate($request, [
            'question'=> 'required',
        ]);
        // $filename = "";
        // if ($request->hasFile('image')) {
        //    $filename= $request->image->getClientOriginalName();
        //    $request->image->storeAs('images/exercise/'.$topic->id, $filename,'public');
        // }
        $request->user()->exercise()->create([
            'topic_id'=> $topic-> id,
            'question'=> $request->question,
            // 'file'=> $filename,
            // 'link'=> $request->link,
            // 'title'=> $request->title,
            // 'description'=> $request->description,
            // 'start'=> $request->start,
            // 'end'=> $request->end,
            // 'is_active'=> $request->is_active,
        ]);

        return redirect()->route('users.topics.manage', [auth()->user(), $topic->id]);
    }

    public function delete(Request $request, User $user, Exercise $exercise){
        // $exercises = Exercise::findOrFail($exercise->id);
        $exercises = $user->exercise->where('id', '=', $exercise->id);
        if ($exercise) {
            $exercise->delete();
        }
        return back();
    }

    public function update(User $user, Exercise $exercise){
        return view('question.update_question', [
            'exercise'=> $exercise
        ]);
    }

    public function updatestore(Request $request, User $user,  Exercise $exercise){
        $this->validate($request, [
            'question'=> 'max:255',
        ]);

        DB::table('exercises')->where('id', $exercise->id)->where('user_id',  auth()->user()->id)
            ->update([
            'question'=> $request-> question !== null && $request-> question !== '' ?  $request-> question : $question-> question,
        ]);
        return redirect()->route('users.topics.manage', [auth()->user(), $exercise->topic_id]);
    }
}
