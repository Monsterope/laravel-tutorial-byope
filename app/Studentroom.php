<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentroom extends Model
{
    public $fillable = ["classroom_id", "room"];

    public function classroom()
    {
        return $this->hasOne(Classroom::class, 'id', 'classroom_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'studentroom_id', 'id');
    }
}
