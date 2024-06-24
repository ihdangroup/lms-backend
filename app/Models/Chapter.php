<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Chapter extends Model
{
    protected $primaryKey ='video_id';
    // public function student() {
    //     return $this->hasMany(Student::class, 'class_id', 'id');
    // }
    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class);
    // }
}