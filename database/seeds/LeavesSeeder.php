<?php

use Illuminate\Database\Seeder;

class LeavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Leave::class, 20)->create();
    }
}
