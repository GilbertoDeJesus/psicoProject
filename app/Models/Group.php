<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducativeProgram;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['name','active'];

    public function educativeProgram()
    {
        return $this->belongsTo(EducativeProgram::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
