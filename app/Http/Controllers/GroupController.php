<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class GroupController extends Controller
{
    public function presentlibray($id,$lesson = '')
    {
        if (empty(trim($lesson))) {
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
            return view('theme');
        }
    }
}
