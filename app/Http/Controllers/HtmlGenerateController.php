<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupData;
use Illuminate\Http\Request;

class HtmlGenerateController extends Controller
{
    public static function generateHeader()
    {
        $groups = Group::getActiveGroups();
        $groupsAndCourses = $groups->each(function ($item) {
            $item->groupCourses = GroupData::getActiveGroupsCourses($item->id);
        });
        return $groupsAndCourses;
    }

    public function ajaxGetCoursesForGroup(Request $request)
    {
        return GroupData::getCoursesForGroup($request->post('group'));
    }
}
