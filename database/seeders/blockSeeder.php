<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Block;
class blockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i <5 ; $i++) {
            Block::create([
                'blockname'          => $faker->name(),
                'blockcode'          => rand(100,500),
            ]);
    }
}
}
