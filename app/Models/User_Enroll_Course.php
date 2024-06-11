<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class User_Enroll_Course extends Model
{
    public function student() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function course() {
        return $this->hasMany(Course::class, 'id', 'course_id');
    }
}