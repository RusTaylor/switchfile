<?php

namespace App\Http\Controllers;

use App\GroupData;
use App\GroupSource;
use App\Source;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $groupSources = DB::table('group_source as gs')
            ->select(['gs.id', 'g.name as groupName', 'gd.course', 'gs.lesson', 'gs.title', DB::raw('count(s.id) as sources')])
            ->leftJoin('source as s', 'gs.id', '=', 's.resource_id')
            ->leftJoin('group_data as gd', 'gs.group_data_id', '=', 'gd.id')
            ->leftJoin('group as g', 'g.id', '=', 'gd.group_id')
            ->groupBy(['gs.id'])
            ->paginate(10);
        return view('account.dashboard', compact('groupSources'));
    }

    public function editTheme($themeId)
    {
        /** @var GroupSource $theme */
        $theme = GroupSource::find($themeId);

        if (empty($theme)) {
            return redirect()->back()->with('error', 'Тема не найдена');
        }

        $sources = $theme->source()->get()->toArray();

        /** @var GroupData $course */
        $course = $theme->groupData()->get()->get(0);

        $group = null;

        if (!empty($course)) {
            $group = $course->group()->get()->get(0);
        }

        return view('account.edit.themeEdit', compact('sources', 'course', 'theme', 'group'));
    }
}
