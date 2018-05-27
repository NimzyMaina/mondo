<?php

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::truncate();

        $data = [
            ['name' => 'Safaricom'],
            ['name' => 'Airtel'],
            ['name' => 'Orange']
        ];

        foreach ($data as $d) {
            Provider::create($d);
        }
    }
}
