<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducativeProgram;
use App\Models\Student;

class Group extends Model
{
    use HasFactory;

    public function educativeProgram()
    {
        return $this->belongsTo(EducativeProgram::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
