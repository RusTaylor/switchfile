<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Group extends Model
{
    protected $table = 'group_source';
    protected $fillable = ['group', 'course', 'lesson', 'title', 'description'];

    public static function getGroupSource(string $group, int $course)
    {
        $result = self::where([
            'group' => $group,
            'course' => $course
        ])->get();

        return $result;
    }


    public static function setGroupSource(array $data)
    {
        $result = self::where([
            'group' => $data['group'],
            'course' => $data['course'],
            'lesson' => $data['lesson'],
            'title' => $data['title'],
        ])->first();

        if (!$result){
           if (!$result = self::create($data)){
               return $message = ['type' => 'error','message' => 'Ошибка при создание темы'];
           }
            return true;
        }else{
            return $message = ['type' => 'error','message' => 'Такая тема уже существует'];
        }
    }

}
