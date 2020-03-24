<?php

namespace App;

use App\Helpers\ObjectHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class GroupData
 * @package App
 * @property int $id
 * @property int $group_id
 * @property int $course
 * @property bool $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class GroupData extends Model
{
    protected $table = 'group_data';

    public function group()
    {
        return $this->hasOne('App\Group','id','group_id');
    }


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
