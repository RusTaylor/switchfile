<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSource extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_source')->insert([
            'group' => 'ksk',
            'course' => 2,
            'lesson' => 'mdk',
            'title' => 'Books',
            'description' => 'Books'
        ]);
    }
}
