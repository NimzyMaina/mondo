<?php

use App\Models\Quality;
use Illuminate\Database\Seeder;

class QualitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quality::truncate();

        $data = [
            ['name' => 'Excellent'],
            ['name' => 'Good'],
            ['name' => 'Bad'],
            ['name' => 'Terrible']
        ];

        foreach ($data as $d)
            Quality::create($d);

    }
}
