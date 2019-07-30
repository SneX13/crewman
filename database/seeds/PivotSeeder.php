<?php

use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = App\Role::all();

        App\Assignment::all()->each(function ($assignment) use ($roles) {
            $assignment->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $locations = App\Location::all();

        App\Assignment::all()->each(function ($assignment) use ($locations) {
            $assignment->locations()->attach(
                $locations->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $leaves = App\Leave::all();

        App\Assignment::all()->each(function ($assignment) use ($leaves) {
            $assignment->leaves()->attach(
                $leaves->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
