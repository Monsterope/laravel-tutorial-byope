<?php

namespace App\Console\Commands;

use App\Classroom;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $result = Classroom::where('id', 2)->first();
        foreach ($result->studentroom as $key => $value) {
            dump($key);
            dump($value->student);
            // dump($value->student->where('id', 17)->first());
        }

        // dd($result->studentroom[0]->where("id", 2)->first());
    }
}
