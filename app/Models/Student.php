<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Result;
use App\Models\Test;

class Student extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }
}
