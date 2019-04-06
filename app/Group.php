<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Group extends Model
{
    protected $table = 'group_source';
    public static function getGroupSource(string $group, int $course)
    {
        $result = self::where([
            'group' => $group,
            'course' => $course
            ])->get();

        return $result;
    }

}
