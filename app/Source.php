<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    protected $table = 'source';

    public static function getSources(int $sourceId)
    {
        $sources = DB::table('source as s')
            ->select(['s.name_file', 's.preview', 's.to_way'])
            ->join('group_source as gs', 's.resource_id', '=', 'gs.id')
            ->where('gs.id', '=', $sourceId)
            ->get();
        return $sources;
    }

}
