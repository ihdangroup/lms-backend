<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\ClassRoom;
use App\Models\Extracuriccullar;

class Student extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = ['name', 'gender', 'nis', 'class_id', 'image'];
    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    public function extracuriccullar()
    {
        return $this->belongsToMany(Extracuriccullar::class, 'student_extra', 'student_id', 'extracuricullar_id');
    }
}