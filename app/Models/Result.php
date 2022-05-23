<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducativeProgram;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['test_orientacional1_id','test_orientacional2_id',
    'test_orientacional3_id','test_aprendizaje','test_status_academico',
    'student_id','active'];

    public function educativeProgramTestOrientacional1()
    {
        return $this->belongsTo(EducativeProgram::class, 'test_orientacional1_id');
    }

    public function educativeProgramTestOrientacional2()
    {
        return $this->belongsTo(EducativeProgram::class, 'test_orientacional2_id');
    }

    public function educativeProgramTestOrientacional3()
    {
        return $this->belongsTo(EducativeProgram::class, 'test_orientacional3_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
