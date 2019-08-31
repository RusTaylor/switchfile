<?php

namespace App;

use App\Helpers\ObjectHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
