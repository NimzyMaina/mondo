<?php

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::truncate();

        $data = [
            ['name' => 'Westlands'],
            ['name' => 'Kilimani'],
            ['name' => 'Gigiri'],
            ['name' => 'Upper Hill'],
            ['name' => 'CBD'],
            ['name' => 'Ngong Road'],
            ['name' => 'Kikuyu'],
            ['name' => 'Thika Road/Kasarani'],
            ['name' => 'Karen'],
            ['name' => 'Ridgeways'],
            ['name' => 'Eastlands'],
            ['name' => 'Hurlingham'],
            ['name' => 'Ngumo/Kenyatta'],
            ['name' => 'Buruburu'],
            ['name' => 'South B/C'],
            ['name' => 'Parklands'],
            ['name' => 'Lavington'],
        ];

        foreach ($data as $d)
            Zone::create($d);
    }
}
