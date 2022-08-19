<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Result;
use App\Models\Test;
use App\Models\EducativeProgram;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use HasFactory, SoftDeletes;
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
        return $this->belongsToMany(Test::class)->withPivot('answers', 'finished');
    }
    public function test1()
    {
        return $this->belongsToMany(Test::class)->where('test_id',1)->latest('created_at');
    }
    public function test2()
    {
        return $this->belongsToMany(Test::class)->where('test_id',2)->latest('created_at');
    }
    public function test3()
    {
        return $this->belongsToMany(Test::class)->where('test_id',3)->latest('created_at');
    }
   

    //Encripta la contraseña del alumno
    public function setPasswordAttribute($password){
        // $this->attributes['password'] = bcrypt($password);
        $this->attributes['password'] = Hash::make($password);
    }

}
