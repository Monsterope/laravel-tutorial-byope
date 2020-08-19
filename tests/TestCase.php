<?php

namespace Tests;

use App\Account;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function CreateAccount($data = [], $manualItem = false)
    {

        $resultItem = [
            "username" => "admin",
            "password" => bcrypt("123456"),
            "type" => "adm",
            "status" => "acc"
        ];

        if ($manualItem == true){
            $resultItem["username"] = $data["username"];
            $resultItem["type"] = $data["type"];
            $resultItem["status"] = $data["status"];
        }
        
        $acc = new Account($resultItem);

        return $acc;
    }
    
}
