<?php

use Illuminate\Database\Seeder;

class EmploymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employment::class, 50)->create();
    }

}
