<?php

use Illuminate\Database\Seeder;


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
      //$this->call(AgendaTableSeeder::class);
      $this->call(ArtistsTableSeeder::class);
      $this->call(GenresTableSeeder::class);
      $this->call(TracksTableSeeder::class);
      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin')]);
    }
}
