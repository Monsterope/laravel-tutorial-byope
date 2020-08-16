<?php

use Illuminate\Database\Seeder;

class StudentroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Studentroom::class, 10)->create();
    }
}
