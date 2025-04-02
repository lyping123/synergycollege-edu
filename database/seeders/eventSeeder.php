<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'image' => 'assets/images/badminton.jpg',
                'title' => 'BADMINTON TOURNAMENT',
                'date' => '2023-12-08',
                'time' => '  8:00 AM - 5:00 PM',
                'location' => 'Sunway Sports Center',
                
            ],
            [
                'image' => 'assets/images/convecation.jpg',
                'title' => 'CONVOCATION 2024',
                'date' => '2024-12-20',
                'time' => '9:00 AM - 12:00 PM',
                'location' => 'Pearl View Hotel',
            ],
            [
                'image' => 'assets/images/bownling.jpg',
                'title' => 'BOWLING TOURNAMENT',
                'date' => '2025-01-16',
                'time' => ' 10:00 AM - 2:00 PM',
                'location' => 'Megamall Bowling Centre',
                
            ],
            [
                'image' => 'assets/images/rumah kasih sayang.jpg',
                'title' => 'CHARITY FOR ORPHANS EVENTS',
                'date' => ' 2025-02-02',
                'time' => ' 1:00 PM - 4:00 PM',
                'location' => 'Bukit Mertajam',
            ],
        ]);
    }
}
