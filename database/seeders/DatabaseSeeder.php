<?php

namespace Database\Seeders;

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
        //    \App\Models\User::factory(10)->create();
           \App\Models\Departments::factory(11)->create();
           \App\Models\Courses::factory(44)->create();
           \App\Models\Students::factory(100)->create();
    }
}
