<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducativeProgram;
use App\Models\Answer;
use App\Models\Type;
use App\Models\Test;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['question','status','is_example','order','type_id',
    'educative_program_id','active'];

    public function educativeProgram()
    {
        return $this->belongsTo(EducativeProgram::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tests()
    {
        return $this->BelongsToMany(Test::class);
    }
}
