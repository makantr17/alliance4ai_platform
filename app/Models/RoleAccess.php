<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RoleAccess extends Model
{
    protected $fillable = [
        'is_admin',
        'grant_user_topic',
        'grant_user_discussion',
        'grant_user_circles',
        'grant_user_learning',
        'grant_user_hackerthon',
        'delete_user_topic',
        'delete_user_discussion',
        'delete_user_circles',
        'delete_learning',
        'delete_hackerthon',
        'is_root',

    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
