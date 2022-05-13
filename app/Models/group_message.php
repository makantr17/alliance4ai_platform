<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Topic_circle;

class group_message extends Model
{
    protected $fillable = [
        'topic_id',
        'message',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function topiccircle(){
        return $this->belongsTo(Topic_circle::class);
    }
}
