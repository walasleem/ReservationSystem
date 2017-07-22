<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use  App\Airport;
use Faker\Factory as Faker;

class SeedAirportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:airport-seed';

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
     * @return mixed
     */
    public function handle()
    {
    $faker=Faker::create();

for($i=0;$i<100;$i++){
Airport::create([
    'name'=>$faker->name,
    'city_id'=>$i

    ]);

//Airport::reindex();

}


    }
}
