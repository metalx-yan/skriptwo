<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['administrator','ppic','purchasing','pimpinan'];

        foreach ($roles as $role) {
            App\Role::create([
                'name' => $role
            ]);
        }
    }
}
