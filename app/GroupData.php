<?php

namespace App;

use App\Helpers\ObjectHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupData extends Model
{
    protected $table = 'group_data';

    public static function getActiveGroupsCourses($groupId)
    {
        $courses = self::where([
            'group_id' => $groupId
        ])
            ->orderByRaw('course')
            ->get();
        $courses = ObjectHelper::convertObjectsArray($courses, [
            'course'
        ]);
        return collect($courses);
    }

    public static function getCoursesForGroup($groupAlias)
    {
        return DB::table('group_data as gd')
            ->select('course')
            ->join('group as g', 'g.id', '=', 'gd.group_id')
            ->where('g.alias', '=', $groupAlias)
            ->orderByRaw('course')
            ->get();
    }
}
