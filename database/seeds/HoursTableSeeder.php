<?php


use App\Models\Hour;
use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hour::truncate();

        $data = [
            ['name' => 'Weekends Only'],
            ['name' => 'Week Nights Only'],
            ['name' => 'Weekend Day'],
            ['name' => 'Weekend Night'],
            ['name' => '24/7'],
            ['name' => 'Sunday Only'],
            ['name' => 'Night Only'],
            ['name' => 'Weekdays & Weekend Days'],
            ['name' => 'Week Nights & Weekend Nights']
        ];

        foreach ($data as $d) {
            Hour::create($d);
        }
    }
}
