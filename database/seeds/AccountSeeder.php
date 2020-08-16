<?php

use App\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            "username" => "admin1",
            // "password" => md5("123456"),
            "password" => bcrypt("123456"),
            "type" => "adm",
            "status" => "acc",
        ]);
        Account::create([
            "username" => "admin2",
            // "password" => md5("123456"),
            "password" => bcrypt("123456"),
            "type" => "adm",
            "status" => "blo",
        ]);
        Account::create([
            "username" => "student",
            // "password" => md5("123456"),
            "password" => bcrypt("123456"),
            "type" => "stu",
            "status" => "acc",
        ]);
    }
}
