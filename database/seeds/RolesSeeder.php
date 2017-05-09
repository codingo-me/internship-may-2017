<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $now = \Carbon\Carbon::now();

        \DB::table('roles')->insert([
            'name' => 'Staff',
            'created_at' => $now,
            'updated_at' => $now
        ]);

       \DB::table('roles')->insert([
           'name' => 'Administrator',
           'created_at' => $now,
           'updated_at' => $now
       ]);
    }
}
