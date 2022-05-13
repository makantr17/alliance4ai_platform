<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;
use App\Models\Discussion;

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

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->hasMany(Topic::class);
    }
}
