<?php

namespace App\Models;
use App\Models\Topic;
use App\Models\User;
use App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'topic_id',
        'user_id',
        'question',
        'explanation',
        'is_active'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
