<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Competitor;

class Hackerthon extends Model
{
    protected $fillable = [
        'titre',
        'category',
        'description',
        'instructions',
        'tasks',
        'limit_group',
        'isavailable',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function isCompeting(User $user){
        return $this->competitors->contains('user_id', $user->id);
    }

    public function competitors(){
        return $this->hasMany(Competitor::class);
    }
}
