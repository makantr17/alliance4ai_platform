<?php

namespace App\Models;
use App\Models\Exercise;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'exercise_id',
        'answer',
        'file',
        'link',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }

}
