<?php

use App\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 7; $i++) { 
            Classroom::create(
                ["classname" => (string) $i]
            );
        }
        
    }
}
