<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(EmploymentsSeeder::class);
        $this->call(EmployersSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(LeavesSeeder::class);
        $this->call(AssignmentsSeeder::class);
        $this->call(PivotSeeder::class);
    }
}
