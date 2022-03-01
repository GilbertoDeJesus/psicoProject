<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Student;

class Test extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class)->withPivot('answers', 'finished');
    }
}
