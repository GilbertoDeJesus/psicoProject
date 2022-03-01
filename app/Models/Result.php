<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducativeProgram;
use App\Models\Student;

class Result extends Model
{
    use HasFactory;

    public function educativeProgramTestOrientacional1()
    {
        return $this->belongsTo(EducativeProgram::class, 'test_orientacional1_id');
    }

    public function educativeProgramTestOrientaconal2()
    {
        return $this->belongsTo(EducativeProgram::class, 'test_orientacional2');
    }

    public function educativeProgramTestOrientaconal3()
    {
        return $this->belongsTo(EducativeProgram::class, 'test_orientacional3');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
