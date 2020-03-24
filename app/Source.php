<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class Source
 * @package App
 * @property int $id
 * @property int $resource_id
 * @property string $name_file
 * @property string $preview
 * @property string $to_way
 * @property string $created_at
 * @property string $updated_at
 */
class Source extends Model
{
    protected $table = 'source';

    protected $fillable = ['name_file', 'to_way', 'resource_id'];

    public static function getSources(int $sourceId)
    {
        return DB::table('source as s')
            ->select(['s.name_file', 's.preview', 's.to_way'])
            ->join('group_source as gs', 's.resource_id', '=', 'gs.id')
            ->where('gs.id', '=', $sourceId)
            ->get();
    }

    public function deleteFile()
    {
        if (empty($this->to_way)) {
            return;
        }

        Storage::delete('public/' . $this->to_way);
    }
}
