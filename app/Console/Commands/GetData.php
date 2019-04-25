<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:data';

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
        $provinces = DB::connection('viemgan')->table('provinces')->get();
        foreach ($provinces as $province) {
            DB::table('provinces')->insert([
                'id' => $province->id,
                'name' => $province->name,
                'slug' => $province->slug,
                'domain' => $province->domain
            ]);
        }
        $districts = DB::connection('viemgan')->table('districts')->get();
        foreach ($districts as $district) {
            DB::table('districts')->insert([
                'id' => $district->id,
                'name' => $district->name,
                'slug' => $district->slug,
                'province_id' => $district->province_id
            ]);
        }
    }
}
