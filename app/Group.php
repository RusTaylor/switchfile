<?php

namespace App;

use App\Helpers\ObjectHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Group
 * @package App
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property bool $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class Group extends Model
{
    protected $table = 'group';

    public static function getActiveGroups()
    {
        $groups = self::where([
            'is_active' => true
        ])->get();
        $groups = ObjectHelper::convertObjectsArray($groups, [
            'id',
            'name',
            'alias'
        ]);
        return collect($groups);
    }

    public static function getAllGroups()
    {
        $group = DB::table('group')
            ->select(['name', 'alias'])
            ->get();
        return $group->toArray();
    }
}
