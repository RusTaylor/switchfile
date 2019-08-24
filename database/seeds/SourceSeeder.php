<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source')->insert([
            'resource_id' => 1,
            'name_file' => 'book',
            'preview' => 'book.pdf',
            'to_way' => 'sdfsf'
        ]);
    }
}
