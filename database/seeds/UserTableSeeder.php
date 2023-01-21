<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'administrator',
            'username' => 'administrator',
            'password' => 'user',
            'role_id' => 1
        ]);
        App\User::create([
            'name' => 'ppic',
            'username' => 'ppic',
            'password' => 'user',
            'role_id' => 2
        ]);
        App\User::create([
            'name' => 'purchasing',
            'username' => 'purchasing',
            'password' => 'user',
            'role_id' => 3
        ]);
        App\User::create([
            'name' => 'pimpinan',
            'username' => 'pimpinan',
            'password' => 'user',
            'role_id' => 4
        ]);

    }
}
