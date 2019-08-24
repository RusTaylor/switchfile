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
        $this->call([
            GroupDataSeeder::class,
            GroupSourceSeeder::class,
            SourceSeeder::class,
            UsersSeeder::class
        ]);
    }
}
