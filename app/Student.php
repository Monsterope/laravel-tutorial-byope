<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = ["studentroom_id", "firstname", "lastname", "nickname", "status"];

    public function studentroom()
    {
        return $this->hasOne(Studentroom::class, "id", "studentroom_id");
    }
    
}
