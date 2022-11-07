<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ratings')->insert([
            'user_id'=>'1',
            'game_id'=>'1',
            'rating'=>'4',
            'review'=>'This is a review',
            'date'=>'2011-08-01'
        ]);
    }
}
