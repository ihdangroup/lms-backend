<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracuriccullar extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_extra', 'extracuricullar_id', 'student_id');
    }
}