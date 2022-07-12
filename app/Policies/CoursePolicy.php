<?php

namespace App\Policies;

use App\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    
    public function delete(User $user, Course $course){
        return $user->id === $course->user_id;
    }

   
    public function forceDelete(User $user, Course $course)
    {
        //
    }
}
