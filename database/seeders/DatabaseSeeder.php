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
        $superadmin->name = 'David Ortega';
        $superadmin->email = 'davidortegacadena@gmail.com';
        $superadmin->person_types_id='1';
        $superadmin->password = bcrypt('David312483');
        $superadmin->save();


    }
}
