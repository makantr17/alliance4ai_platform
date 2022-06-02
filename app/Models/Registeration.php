<?php

namespace App\Models;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Registeration;

use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{
    protected $fillable = [
        'user_id',
        'discussion_id',
        'attended',
        'attended_date',
    ];

    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function discussion(){
        return $this->belongsTo(Discussion::class);
    }
}


