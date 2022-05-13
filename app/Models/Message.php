<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Topic;
use App\Models\commentlikes;

class Message extends Model
{
    protected $fillable = [
        'topic_id',
        'message',
    ];
    
    public function commentlikedBy(User $user){
        return $this->likescomment->contains('user_id', $user->id);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function ownedBy(User $user){
    //     return $user->id === $this->user_id;
    // }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function likescomment(){
        return $this->hasMany(commentlikes::class);
    }
}
