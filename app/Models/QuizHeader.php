<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\User;
use App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizHeader extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
