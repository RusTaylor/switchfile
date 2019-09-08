<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupData;
use App\Lesson;
use Illuminate\Http\Request;

class HtmlGenerateController extends Controller
{
    /**
     * Возвращает коллекцию* групп с их курсами
     * ```php
     * [
     * ['name' => '{Название}','alias' => '{name}','groupCurses' => [
     * ['course' => '{course(int)}']
     * ...
     * ]]
     * ...
     * ]
     * @return \Illuminate\Support\Collection
     */
    public static function createGroupsListForHeader()
    {
        $groups = Group::getActiveGroups();
        $groupsAndCourses = $groups->each(function ($item) {
            $item->groupCourses = GroupData::getActiveGroupsCourses($item->id);
        });
        return $groupsAndCourses;
    }

    /**
     * @param Request $request
     * Возвращает все курсы для переданной группы
     * @return \Illuminate\Support\Collection
     */
    public function ajaxGetCoursesForGroup(Request $request)
    {
        return GroupData::getCoursesForGroup($request->post('group'));
    }

    /**
     * @param Request $request
     * Возвращает все уроки для группы по данному курсу
     * @return \Illuminate\Support\Collection
     */
    public function ajaxGetLessonsForGroupCourse(Request $request)
    {
        return Lesson::getLessonsForGroupCourse($request->post());
    }
}
