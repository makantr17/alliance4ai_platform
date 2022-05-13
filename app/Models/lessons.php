<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Course;

class lessons extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'link',
        'estimate_time',
        'status'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
