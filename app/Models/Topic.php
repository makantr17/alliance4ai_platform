<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Discussion;
use App\Models\User;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\Message;
use App\Models\Like;
use App\Models\Prompts;
use App\Models\Question;
use App\Models\QuizHeader;

class Topic extends Model
{
    protected $fillable = [
        // 'discussion_id',
        'topic',
        'category',
        'description',
        'status',
        'image',
    ];

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    // public function numTopic(Discussion $discussion){
    //     return $this->discussion->contains('discussion_id', $discussion->id);
    // }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userOf(){
        return $this->hasMany(User::class);
    }

    // public function discussion(){
    //     return $this->belongsTo(Discussion::class);
    // }

    public function content(){
        return $this->hasMany(Content::class);
    }
    public function exercise(){
        return $this->hasMany(Exercise::class);
    }
    public function prompts(){
        return $this->hasMany(Prompts::class);
    }
    public function message(){
        return $this->hasMany(Message::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function quizHeaders()
    {
        return $this->hasMany(QuizHeader::class);
    }
}
