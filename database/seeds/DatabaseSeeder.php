<?php

use App\Account;
use App\Studentroom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(StudentroomSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
