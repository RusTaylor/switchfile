<?php

namespace App\Http\Controllers;

use App\Group;
use App\Source;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $sources = Group::all();
        foreach ($sources as $source) {
            $source->resource = count(Source::where([
                'resource_id' => $source->id,
                'group' => $source->group,
                'course' => $source->course
            ])->get());
            $data[] = $source;
        }
        return view('account.dashboard', compact('data'));
    }

    public function View($id)
    {
        $group_source = Group::where([
            'id' => $id
        ])->first();
        $source = Source::where([
            'resource_id' => $group_source->id,
            'group' => $group_source->group,
            'course' => $group_source->course
        ])->get();
//        return view('account.view');
        dd([$group_source,$source]);
    }

    public function Edit($id)
    {

    }

    public function Delete($id)
    {

    }
}
