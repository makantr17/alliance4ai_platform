<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class user_jobs extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'requirements',
        'links',
        'finished_at'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
