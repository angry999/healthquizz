<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TodayUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'TodayUsers:check';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'This laravel cronjob is used to check how many students absent today';
 

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
     * @return mixed
     */
    public function handle()
    {
        $count = \DB::table('users')
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
 
            echo date('Y-m-d h:m:s');
    }
}
