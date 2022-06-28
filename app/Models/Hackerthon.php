<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Competitor;

class Hackerthon extends Model
{
    protected $fillable = [
        'title',
        'category',
        'subtitle1',
        'description1',
        'subtitle2',
        'description2',
        'images',
        'instructions',
        'evaluation',
        'rules',
        'limit_group',
        'first_prize',
        'second_prize',
        'third_prize',
        'start_date',
        'deadline',
        'link1',
        'link2',
        'isvalidate',
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
