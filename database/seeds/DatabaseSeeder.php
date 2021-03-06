<?php

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
        $this->call(LaratrustSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(LimitTableSeeder::class);
    }
}
