<?php

use Illuminate\Database\Seeder;
use App\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Generamos datos de prueba con su seeder
        //$this->call(PersonasTableSeeder::class);
      $this->call(AgendaTableSeeder::class);
      $this->call(ArtistsTableSeeder::class);
      $this->call(TracksTableSeeder::class);
      Genre::create(['name' => 'Techno']);
      Genre::create(['name' => 'House']);
      Genre::create(['name' => 'Electro']);
      Genre::create(['name' => 'Dubstep']);
      Genre::create(['name' => 'Trance']);
    }
}
