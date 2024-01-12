<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create a default banner
        DB::table('banners')->insert([
            'title' => '2024',
            'description' => 'The year of divine intervention',
            'image' => 'https://via.placeholder.com/450',
        ]);
    }
}
