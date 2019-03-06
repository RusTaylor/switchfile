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
        if (empty(trim($source_id))) {
            $group = mb_substr(Route::current()->getPrefix(), 1);
            $materials = Group::where([
                "group" => $group,
                "course" => $id
            ])->get();
            // Доделать контроллер и проверить его(для изменения)
            return view('group', compact('materials'));
            }
        else{
            //сделать логику вытаскивания из бд с содержанием тем для предметов
            $group = mb_substr(Route::current()->getPrefix(), 1);
            $sources = Source::where([
                "group" => $group,
                "course" => $id,
                "resource_id" => $source_id
            ])->get();
            return view('theme',compact('sources'));
        }
    }
}
