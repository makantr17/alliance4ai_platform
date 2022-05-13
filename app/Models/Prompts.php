<?php

namespace App\Models;
use App\Models\Topic;
use App\Models\User;
use App\Models\CommentPrompts;

use Illuminate\Database\Eloquent\Model;

class Prompts extends Model
{
    protected $fillable = [
        'topic_id',
        'question',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function commentprompts(){
        return $this->hasMany(CommentPrompts::class);
    }
}
