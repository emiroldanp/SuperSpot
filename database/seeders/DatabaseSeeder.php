<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('series')->insert([

            'name' => 'Watchmen',
            'release_date' => '1986-09-01',
            'editorial' => 'DC Comics',
            'rating' => 4.9,
            
        ]);
        DB::table('series')->insert([
            'name' => 'Bone',
            'release_date' => '1991-07-01',
            'editorial' => 'Image Comics',
            'rating' => 4.9,
            
        ]);
        DB::table('series')->insert([
            'name' => 'Mister Miracle',
            'release_date' => '2013-01-01',
            'editorial' => 'Marvel Comics',
            'rating' => 4.9,
            
        ]);
        DB::table('series')->insert([
            'name' => 'Batman: The Dark Knight Returns',
            'release_date' => '1986-01-01',
            'editorial' => 'DC Comics',
            'rating' => 4.9,
            
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Drama',
        ]);
        DB::table('categories')->insert([
            'name' => 'Comedia',
        ]);
        DB::table('categories')->insert([
            'name' => 'Romance',
        ]);
        DB::table('categories')->insert([
            'name' => 'Misterio',
        ]);
        DB::table('categories')->insert([
            'name' => 'Acción',
        ]);
    }
    
}
