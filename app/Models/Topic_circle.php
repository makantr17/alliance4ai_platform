<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group;

class Topic_circle extends Model
{
    protected $fillable = [
        'title',
        'description',
        'title',
        'category',
        'type',
        'content',
        'link',
        'start_time',
        'end_time',
        'status',
        'group_id',
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group(){
        return $this->hasMany(Group::class);
    }
}
