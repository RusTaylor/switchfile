<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupSource extends Model
{
    protected $table = 'group_source';
    protected $fillable = ['group', 'course', 'lesson', 'title', 'description'];

// TODO: Переписать все методы
    public static function getGroupSources(string $group, int $course)
    {
        $groupSources = DB::table('group_source as gs')
            ->select(['gs.id', 'gs.lesson', 'gs.title', 'gs.description'])
            ->join('group_data as gd', 'gs.group_data_id', '=', 'gd.id')
            ->join('group as g', 'g.id', '=', 'gd.group_id')
            ->join('lesson as l', 'l.group_data_id', '=', 'gd.id')
            ->where([
                ['g.alias', '=', $group],
                ['gd.course', '=', $course]
            ])
            ->get();
        return $groupSources;
    }


    public static function setGroupSource(array $data)
    {
        $result = self::where([
            'group' => $data['group'],
            'course' => $data['course'],
            'lesson' => $data['lesson'],
            'title' => $data['title'],
        ])->first();

        if (!$result) {
            if (!$result = self::create($data)) {
                return $message = ['type' => 'error', 'message' => 'Ошибка при создание темы'];
            } else {
                return true;
            }
        } else {
            return $message = ['type' => 'error', 'message' => 'Такая тема уже существует'];
        }
    }

}
