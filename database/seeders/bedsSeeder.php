<?php

namespace Database\Seeders;
use App\Models\Beds;
use Illuminate\Database\Seeder;

class bedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <5 ; $i++) {
            Beds::create([
                'room_id'          => rand(1,5)
            ]);
    }
    }
}
