<?php

namespace App\Http\Controllers;

use App\GroupSource;
use App\Source;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $groupSources = DB::table('group_source as gs')
            ->select(['gs.id', 'gs.group', 'gs.course', 'gs.lesson', 'gs.title', DB::raw('count(s.id) as sources')])
            ->leftJoin('source as s', 'gs.id', '=', 's.resource_id')
            ->groupBy('gs.id')
            ->get();
        return view('account.dashboard', compact('groupSources'));
    }

    public function View($id)
    {
        $group_source = GroupSource::where([
            'id' => $id
        ])->first();
        $source = Source::where([
            'resource_id' => $group_source->id,
            'group' => $group_source->group,
            'course' => $group_source->course
        ])->get();
//        return view('account.view');
        dd([$group_source, $source]);
    }

    public function Edit($id)
    {

    }

    public function Delete($id)
    {

    }
}
