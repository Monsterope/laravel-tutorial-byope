<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        if (request()->has(["username", "password"]) == false){
            return $this->ResponseMsgError("please check input username or password.", 400);
        }

        auth()->attempt([
            "username" => request()->username,
            "password" => request()->password
        ]);
        if (auth()->check() == false){
            return $this->ResponseMsgError("don't have account in system. please check username or password", 400);
        }
        
        // $acc_user = Account::where([
        //     ["username", request()->username],
        //     ["password", md5(request()->password)]
        // ])->first();
        // if ($acc_user == null){
        //     return $this->ResponseMsgError("don't have account in system.", 400);
        // }
        // auth()->loginUsingId($acc_user->id);
        // if (auth()->check() == false){
        //     $this->ResponseMsgError("you not vaildate.", 401);
        // }

        return $this->ResponseBody(["message" => "Login success"]);
        
    }
}
