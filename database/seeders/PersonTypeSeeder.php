<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonType;

class PersonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sa = new PersonType();
        $sa->Description='Superadmin';
        $sa->save();

        $admin = new PersonType();
        $admin->Description='Administrador';
        $admin->save();

        $persona = new PersonType();
        $persona->Description='Granjero';
        $persona->save();
    }
}
