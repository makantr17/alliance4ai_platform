<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Prompts;

class CommentPrompts extends Model
{
    protected $fillable = [
        'prompts_id',
        'message',
    ];
    
    // public function commentlikedBy(User $user){
    //     return $this->likescomment->contains('user_id', $user->id);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function ownedBy(User $user){
    //     return $user->id === $this->user_id;
    // }

    public function prompts(){
        return $this->belongsTo(Prompts::class);
    }

    // public function likescomment(){
    //     return $this->hasMany(commentlikes::class);
    // }
}
