<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use App\Models\Hod;

class HodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hod::create([
            'doctor_id'    => Doctor::first()->id
        ]);
        Hod::create([
            'doctor_id'    => Doctor::latest()->first()->id
        ]);
    }
}
