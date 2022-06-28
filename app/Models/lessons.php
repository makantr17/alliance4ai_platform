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
        'description',
        'content',
        'subtitle1',
        'description1',
        'code1',
        'link1',
        'subtitle2',
        'description2',
        'code2',
        'link2',
        'subtitle3',
        'description13',
        'code3',
        'link3',
        'status',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
