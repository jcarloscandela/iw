<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Eloquent::unguard();
        //if (App::environment()!=='production') {
            DB::table('artists')->delete();
        factory(App\Artist::class, 100)->create();
        //}
    }
}
