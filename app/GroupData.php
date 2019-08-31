<?php

namespace App;

use App\Helpers\ObjectHelper;
use Illuminate\Database\Eloquent\Model;

class GroupData extends Model
{
    protected $table = 'group_data';

    public static function getActiveGroupsCourses($groupId)
    {
        $courses = self::where([
            'group_id' => $groupId
        ])->get();
        $courses = ObjectHelper::convertObjectsArray($courses, [
           'course'
        ]);
        return collect($courses);
    }
}
