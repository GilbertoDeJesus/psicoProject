<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['name','directions','active',
    'order'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class)->withPivot('answers', 'finished','active');
    }
}
