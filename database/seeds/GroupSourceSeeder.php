<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_source')->insert([
            'group_data_id' => 1,
            'lesson' => 'МДК',
            'title' => 'Books',
            'description' => 'Books'
        ]);
    }
}
