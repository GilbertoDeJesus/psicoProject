<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = ['name','family_name','last_name','group_id','phone',
        'contact_phone','email','matricula','password','age'];

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
        return $this->belongsToMany(Test::class)->withPivot('answers', 'finished','active');
    }

    //Encripta la contraseña del alumno
    public function setPasswordAttribute($password){
        // $this->attributes['password'] = bcrypt($password);
        $this->attributes['password'] = Hash::make($password);
    }
}
