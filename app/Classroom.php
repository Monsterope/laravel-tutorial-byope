<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public $fillable = ["classname"];

    public function studentroom()
    {
        return $this->hasMany(Studentroom::class, 'classroom_id', 'id');
    }
    
}
