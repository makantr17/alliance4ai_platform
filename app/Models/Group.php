<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group_member;
use App\Models\Topic_circle;

class Group extends Model
{
    protected $fillable = [
        'name',
        'titre',
        'description',
        'limit',
        'location',
        'image',
        'isavailable',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function joinedBy(User $user){
        return $this->group_member->contains('user_id', $user->id);
    }


    public function group_member(){
        return $this->hasMany(Group_member::class);
    }
    public function topiccircle(){
        return $this->belongsTo(Topic_circle::class);
    }
}
