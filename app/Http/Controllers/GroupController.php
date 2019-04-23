<?php

namespace App\Http\Controllers;

use App\Group;
use App\Lesson;
use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function presentTheme($id, $source_id = '')
    {
        $group = mb_substr(Route::current()->getPrefix(), 1);
        if (!empty(trim($source_id))) {
            $sources = Source::getSource($group, $id, $source_id);
            return view('theme', compact('sources'));
        } else {
            $materials = Group::getGroupSource($group, $id);
            return view('group', compact('materials'));
        }
    }

    public function present_createTheme()
    {
        $lessons = Lesson::all();
        return view('account.create.theme', compact('lessons')); //доделать вид страницы создания темы

    }

    public function createTheme(Request $request)
    {
        $table_colums = ['group', 'course', 'lesson', 'title', 'description'];
        $theme = [];


        try{
            $this->validator($request->all())->validate();
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return back()->with('error','Заполните все формы правильно!');
        };
        foreach ($table_colums as $key) {
            $theme[$key] = $request->input($key);
        }
        $result = Group::setGroupSource($theme);
            if (is_array($result)){
                return back()->with($result['type'],$result['message']);
            }else{
                return redirect(route('account'))->with('success','Тема успешно создана!');
            }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'group' => ['required'],
            'course' => ['required'],
            'lesson' => ['required'],
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string', 'max:255']

        ]);
    }
}
