<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassRoom;

class Teacher extends Model
{
    use HasFactory;
    public function class()
    {
        return $this->hasOne(ClassRoom::class);
    }
}