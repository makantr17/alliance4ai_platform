<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;
use App\Models\Discussion;
use App\Models\Registeration;

class Discussion extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'category',
        'location',
        'admin_1',
        'admin_2',
        'start_time',
        'end_time',
        'link',
        'peoples',
        'groups',
        'topics',
        'date',
    ];

    public function participatedBy(User $user){
        return $this->registeration->contains('user_id', $user->id);
    }

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->hasMany(Topic::class);
    }

    public function registeration(){
        return $this->hasMany(Registeration::class);
    }
}
