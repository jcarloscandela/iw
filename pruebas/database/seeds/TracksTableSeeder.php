<?php

use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //if (App::environment()!=='production') {
            DB::table('tracks')->delete();
        factory(App\Track::class, 100)->create();
        
    }
}
