<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'source';

    public static function getSource(string $group, int $course, int $source_id)
    {
        $result = self::where([
                    'group' => $group,
                    'course' => $course,
                    'resource_id' => $source_id
                ])->get();

        return $result;
    }

}
