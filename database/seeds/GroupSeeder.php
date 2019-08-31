<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group')->insert([
            'name' => 'КСК',
            'alias' => 'ksk',
            'is_active' => true
        ]);
    }
}
