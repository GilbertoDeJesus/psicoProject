<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = ['answer','is_correct','value','status','order',
    'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
