<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    protected $primaryKey = "id";
    public $fillable = ["username", "password", "type", "status"];
}
