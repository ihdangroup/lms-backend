<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class Course extends Model
{
    // protected $table ='class';
    public function chapter() {
        return $this->hasMany(Chapter::class, 'course_id', 'id');
    }
}