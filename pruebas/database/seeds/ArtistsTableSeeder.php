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
        if (App::environment()!=='production') {
            DB::table('artists')->delete();
        // DB::table('artists')->insert([
        //     'name' => str_random(10),
        //     'picture' => '',//str_random(10).'@gmail.com',
        //     'biography' => str_random(20),]);
        // $this->command->info('Artist app seeds finished.');
        factory(App\Artist::class, 100)->create();
        }
    }
}
