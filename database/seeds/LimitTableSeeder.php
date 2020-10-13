<?php

use Illuminate\Database\Seeder;

class LimitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pocketLimit = \App\PocketLimit::create([
            'limit' 	=> 50,
        ]);
    }
}
