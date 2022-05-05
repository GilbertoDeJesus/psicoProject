<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','directions','active',
    'order'];

    public function questions()
    {
        //Se agrega el orderBy desde aquí para cuando en el controlador llamamos a las preguntas nos la devuelva con el orden
        return $this->belongsToMany(Question::class)->orderBy('order','ASC'); 
    }

    public function student()
    {
        return $this->belongsToMany(Student::class)->withPivot('answers', 'finished');
    }
    
}
