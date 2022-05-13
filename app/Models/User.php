<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use App\Models\lessons;
use App\Models\Group;
use App\Models\Group_member;
use App\Models\user_jobs;
use App\Models\Hackerthon;
use App\Models\Discussion;
use App\Models\Topic;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\Response;
use App\Models\Message;
use App\Models\Like;
use App\Models\Topic_circle;
use App\Models\group_message;
use App\Models\commentlikes;
use App\Models\Prompts;
use App\Models\Question;
use App\Models\CommentPrompts;
use App\Models\CommentFiles;
use App\Models\course_user;
use App\Models\Competitor;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'city', 
        'address',
        'phone',
        'gender',
        'age',
        'profession',
        'image',
        'isAdmin',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function course(){
        return $this->hasMany(Course::class);
    }

    public function lessons(){
        return $this->hasMany(lessons::class);
    }

    public function group(){
        return $this->hasMany(Group::class);
    }

    public function discussion(){
        return $this->hasMany(Discussion::class);
    }


    public function group_member(){
        return $this->hasMany(Group_member::class);
    }

    public function usercourse(){
        return $this->hasMany(course_user::class);
    }

    public function user_jobs(){
        return $this->hasMany(user_jobs::class);
    }

    public function hackerthon(){
        return $this->hasMany(Hackerthon::class);
    }

    public function topic(){
        return $this->hasMany(Topic::class);
    }

    public function topiccircle(){
        return $this->hasMany(Topic_circle::class);
    }

    public function content(){
        return $this->hasMany(Content::class);
    }

    public function exercise(){
        return $this->hasMany(Exercise::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }

    public function groupmessage(){
        return $this->hasMany(group_message::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function likescomment(){
        return $this->hasMany(commentlikes::class);
    }

    public function prompts(){
        return $this->hasMany(Prompts::class);
    }

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function answers(){
        return $this->hasMany(Answers::class);
    }

    public function response(){
        return $this->hasMany(Response::class);
    }

    public function commentprompts(){
        return $this->hasMany(CommentPrompts::class);
    }

    public function commentfiles(){
        return $this->hasMany(CommentFiles::class);
    }

    public function competitors(){
        return $this->hasMany(Competitor::class);
    }
    
}
