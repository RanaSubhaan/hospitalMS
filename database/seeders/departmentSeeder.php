<?php

namespace Database\Seeders;

use App\Models\Department;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Department::create([
            'name' => $faker->name(),
            'description' => $faker->paragraph(),
            'photo_path'=>"https://via.placeholder.com/150",
            'block_id'=>1,
            'hod_id'=>1,
        ]);
        Department::create([
            'name' => $faker->name(),
            'description' => $faker->paragraph(),
            'photo_path'=>"https://via.placeholder.com/150",
            'block_id'=>2,
            'hod_id'=>2,
        ]);
    }
}
