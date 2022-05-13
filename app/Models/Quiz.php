<?php

namespace App\Models;
use App\Models\Topic;
use App\Models\User;
use App\Models\Question;
use App\Models\QuizHeader;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function quizHeader()
    {
        return $this->belongsTo(QuizHeader::class);
    }
}
