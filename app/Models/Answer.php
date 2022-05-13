<?php

namespace App\Models;
use App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer',
        'is_checked',
    ];

    public function question(){
        return $this->belongsTo(Queston::class);
    }
}
