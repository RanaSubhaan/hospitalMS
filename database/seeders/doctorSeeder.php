<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class doctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            "employee_id"=>Employee::where("position","doctor")->first()->id
        ]);
        Doctor::create([
            "employee_id"=>Employee::where("position","doctor")->latest()->first()->id
        ]);
    }
}
