<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_data')->insert([
           'group' => 'ksk',
           'course' => 2
        ]);
    }
}
