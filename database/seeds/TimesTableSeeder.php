<?php

use Illuminate\Database\Seeder;
use App\Models\Time;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [
            ['title' => '07:00'],
            ['title' => '07:50'],
            ['title' => '08:40'],

            ['title' => '09:30', 'interval' => 1],

            ['title' => '10:20'],
            ['title' => '11:10'],
            ['title' => '12:00'],
        ];

        foreach($times as $time) {
            Time::create($time);
        }
    }
}
