<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = \App\Models\Role::where('name', 'Administrator')->first();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@codingo.me',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'role_id' => $adminRole->id
        ]);
    }
}
