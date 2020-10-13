<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Admin::create([
            'name' => 'super admin',
            'email' => 'doc@admin.com',
            'password' => Hash::make('55555'),
        ]);
        
        $admin->save();

        $admin->attachRole('superadministrator');
    }
}
