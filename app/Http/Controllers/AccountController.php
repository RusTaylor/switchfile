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
                'resource_id' => $source->id
            ])->get());
            $source->resource = $file_count;
            $data[] = $source;
        }
        return view('account.index', compact('data'));
    }
}
