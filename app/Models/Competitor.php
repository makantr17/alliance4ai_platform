<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Hackerthon;

class Competitor extends Model
{
    protected $fillable = [
        'user_id',
        'hackerthon_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hackerthon(){
        return $this->belongsTo(Hackerthon::class);
    }
}
