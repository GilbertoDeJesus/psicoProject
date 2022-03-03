<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;
use App\Models\Group;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducativeProgram extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['name','active'];

    public function students()
    {
        return $this->hasManyThrough(Student::class, Group::class, 'educative_program_id');
    }

    public function resultsPosition1()
    {
        return $this->hasMany(Result::class, 'test_orientacional1_id');
    }

    public function resultsPosition2()
    {
        return $this->hasMany(Result::class, 'test_orientacional2_id');
    }

    public function resultsPosition3()
    {
        return $this->hasMany(Result::class, 'test_orientacional3_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
