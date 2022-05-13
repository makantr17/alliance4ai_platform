<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Topic;

class QuestionController extends Controller
{
    public function createQuestion(Topic $topic)
    {
        $topic = $topic;
        return view('question.create_question', [
            'topic' => $topic,
        ]);
    }

    public function detailQuestion(Question $question)
    {
        $answers = $question->answers()->paginate(10);
        return view('question.detail_question', compact('question', 'answers'));
    }

    public function storeQuestion(Topic $topic, Request $request){
        $data = $request->validate([
            'question' => 'required',
            'explanation' => 'required',
            'is_active' => 'required',
            'answers.*.answer' => 'required',
            'answers.*.is_checked' => 'present'
        ]);
        $question = Question::create([
            'question' => $request->question,
            'explanation' => $request->explanation,
            'is_active' => $request->is_active,
            'user_id' => auth()->user()->id,
            'topic_id' => $topic->id,
        ]);

        $status = $question->answers()->createMany($data['answers'])->push();
        return redirect()->route('users.topics.manage', [auth()->user()->name, $topic->id])
            ->withSuccess('Question created successfully');
    }
    

    function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return back();
    }
}
