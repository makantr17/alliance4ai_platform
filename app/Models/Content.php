<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;
use App\Models\User;
use App\Models\CommentFiles;

class Content extends Model
{
    protected $fillable = [
        'topic_id',
        'type',
        'file',
        'link',
        'title',
        'description','author','link_auth','subtitle_1','detail_1','subtitle_2','detail_2','subtitle_3','detail_3',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function commentfiles(){
        return $this->hasMany(CommentFiles::class);
    }
}
