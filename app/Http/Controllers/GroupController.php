<?php

namespace App\Http\Controllers;

use App\Group;
use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class GroupController extends Controller
{
    public function presentlibray($id,$source_id = '')
    {
        $group = mb_substr(Route::current()->getPrefix(), 1);
        if (!empty(trim($source_id))) {
            $sources = Source::getSource($group,$id,$source_id);
            return view('theme',compact('sources'));
            }
        else{
            $materials = Group::getGroupSource($group,$id);
            return view('group', compact('materials'));
        }
    }
}
