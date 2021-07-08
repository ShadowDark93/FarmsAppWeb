<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farm;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farm = new Farm();
        $farm->users_id="3";
        $farm->AdminName="El Juanpa";
        $farm->Name="La Maria";
        $farm->Location="Convenio City";
        $farm->Phone="3184019742";
        $farm->save();
    }
}