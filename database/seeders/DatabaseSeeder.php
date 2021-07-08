<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PersonTypeSeeder::class);

        $superadmin = new User();
        $superadmin->name = 'SUPERADMIN - DAVID';
        $superadmin->email = 'david.ortegac@ucc.edu.co';
        $superadmin->person_types_id='1';
        $superadmin->password = bcrypt('David312483');
        $superadmin->estado='1';
        $superadmin->save();

        $admin = new User();
        $admin->name = 'Nelly Clavijo';
        $admin->email = 'nelly.clavijo@ucc.edu.co';
        $admin->person_types_id='2';
        $admin->password = bcrypt('12345678');
        $admin->estado='1';
        $admin->save();

        $user = new User();
        $user->name = 'David Ortega';
        $user->email = 'davidortegacadena@gmail.com';
        $user->person_types_id='3';
        $user->password = bcrypt('David312483');
        $user->estado='1';
        $user->save();

        $this->call(FarmSeeder::class);

    }
}