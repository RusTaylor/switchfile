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
            $file_count = count(Source::where([
                'resource_id' => $source->id,
                'group' => $source->group,
                'course' => $source->course
            ])->get());
            $source->resource = $file_count;
            $data[] = $source;
        }
        return view('account.index', compact('data'));
    }

    public function View($id)
    {

    }

    public function Edit($id)
    {

    }

    public function Delete($id)
    {

    }
}
