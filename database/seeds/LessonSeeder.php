<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson')->insert([
            'name' => 'МДК',
            'group_data_id' => 1
        ]);
    }
}
