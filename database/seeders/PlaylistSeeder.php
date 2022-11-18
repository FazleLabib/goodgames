<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('playlists')->insert([
            'user_id'=>'1',
            'name' => 'name',
            'description'=>'This is a description'
        ]);
    }
}
