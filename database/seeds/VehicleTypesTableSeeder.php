<?php

use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleType::truncate();

        $data = [
            ['name' => 'Budget'],
            ['name' => 'Budget/Large'],
            ['name' => 'Standard'],
            ['name' => 'Standard/Budget'],
            ['name' => 'Standard/Large'],
            ['name' => 'Standard/Budget/Large'],
            ['name' => 'Large'],
            ['name' => 'Motorcycle'],
            ['name' => 'Safari'],
            ['name' => 'Safari/Large'],
            ['name' => 'Safari/Budget'],
            ['name' => 'Safari/Standard'],
        ];

        foreach ($data as $d) {
            VehicleType::create($d);
        }
    }
}
