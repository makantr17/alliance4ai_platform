<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;
use App\Models\User;
use App\Models\Response;

class Exercise extends Model
{
    protected $fillable = [
        'topic_id',
        'question',
        'file',
        'link',
        'title',
        'description',
        'start',
        'end',
        'is_active',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function submitted(User $user){
        return $this->response->contains('user_id', $user->id);
    }

    public function response(){
        return $this->hasMany(Response::class);
    }

}
