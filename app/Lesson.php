<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    protected $table = 'lesson';

    public static function getLessonsForGroupCourse($data)
    {
        return DB::table('lesson as l')
            ->select('l.name as lesson')
            ->join('group_data as gd', 'gd.id', '=', 'l.group_data_id')
            ->join('group as g', 'g.id', '=', 'gd.group_id')
            ->where([
                ['g.alias', '=', $data['group']],
                ['gd.course', '=', $data['course']]
            ])
            ->get();
    }
}
