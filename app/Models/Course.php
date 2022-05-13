<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\course_user;

class Course extends Model
{
    protected $fillable = [
        'titre',
        'description',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function isTaken(User $user){
        return $this->usercourse->contains('user_id', $user->id);
    }

    public function usercourse(){
        return $this->hasMany(course_user::class);
    }
}
