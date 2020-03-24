<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class GroupSource
 * @package App
 * @property int $id
 * @property int $group_data_id
 * @property string $lesson
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class GroupSource extends Model
{
    protected $table = 'group_source';
    protected $fillable = ['group_data_id', 'lesson', 'title', 'description'];

    public function source()
    {
        return $this->hasMany('App\Source','resource_id');
    }

    public function groupData()
    {
        return $this->hasOne('App\GroupData', 'id','group_data_id');
    }

// TODO: Переписать все методы
    public static function getGroupSources(string $group, int $course)
    {
        return DB::table('group_source as gs')
            ->select(['gs.id', 'gs.lesson', 'gs.title', 'gs.description'])
            ->join('group_data as gd', 'gs.group_data_id', '=', 'gd.id')
            ->join('group as g', 'g.id', '=', 'gd.group_id')
            ->join('lesson as l', 'l.group_data_id', '=', 'gd.id')
            ->where([
                ['g.alias', '=', $group],
                ['gd.course', '=', $course]
            ])
            ->groupBy(['gs.id'])
            ->get();
    }


    public static function setGroupSource(Collection $data)
    {
        $hasGroupSource = DB::table('group_source as gs')
            ->join('group_data as gd', 'gd.id', '=', 'gs.group_data_id')
            ->join('group as g', 'g.id', '=', 'gd.group_id')
            ->where([
                ['g.alias', '=', $data->get('group')],
                ['gd.course', '=', $data->get('course')],
                ['gs.lesson', '=', $data->get('lesson')],
                ['gs.title', '=', $data->get('title')],
                ['gs.description', '=', $data->get('description')]
            ])
            ->get();

        if (!$hasGroupSource->all()) {
            $query = DB::table('group_data as gd')
                ->select([
                    DB::raw("'" . $data->get('lesson') . "'" . ' as lesson'),
                    DB::raw("'" . $data->get('title') . "'" . ' as title'),
                    DB::raw("'" . $data->get('description') . "'" . ' as description'),
                    'gd.id as group_data_id'
                ])
                ->join('group as g', 'g.id', '=', 'gd.group_id')
                ->where([
                    ['g.alias', '=', $data->get('group')],
                    ['gd.course', '=', $data->get('course')]
                ]);

            $bindings = $query->getBindings();

            $insertQuery = "INSERT into group_source (lesson, title,description,group_data_id) " . $query->toSql();
            $insertResult = DB::insert($insertQuery, $bindings);
            if ($insertResult) {
                return ['type' => 'success', 'message' => 'Тема успешно создана!'];
            }
            return ['type' => 'error', 'message' => 'Ошибка при создание темы'];
        }
        return ['type' => 'error', 'message' => 'Такая тема уже существует'];
    }

}
