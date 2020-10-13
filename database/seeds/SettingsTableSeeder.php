<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = \App\Setting::create([
            'ar.sitename' 	=> 'دكتور',
            'en.sitename' 	=> 'doctor',
        ]);
    }
}
