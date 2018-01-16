<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        $genres = array ('Techno', 'House', 'Trance', 'Disco', 'D&B', 'Dubstep', 'Electro', 'Electronica', 'Deep-House');

        for($i = 0; $i < count($genres); ++$i){
         DB::table('genres')->insert(['name' => $genres[$i]]);
        }

        //factory(App\Genre::class, 20)->create();

    }
}
