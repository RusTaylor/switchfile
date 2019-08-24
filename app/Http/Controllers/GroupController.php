<?php

namespace App\Http\Controllers;

use App\GroupSource;
use App\Lesson;
use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class GroupController extends Controller
{
    public function presentThemes($group, $id, $sourceId = null)
    {
        if (!empty($sourceId)) {
            $sources = Source::getSources($sourceId);
            return view('theme', compact('sources'));
        }
        $materials = GroupSource::getGroupSources($group, $id);
        return view('group', compact('materials'));
    }

    public function actionCreateTheme()
    {
        $lessons = Lesson::all();
        return view('account.create.theme', compact('lessons')); //доделать вид страницы создания темы

    }

    public function createTheme(Request $request)
    {
        $tableColumns = ['group', 'course', 'lesson', 'title', 'description'];
        $theme = [];
        try {
            $this->validator($request->all())->validate();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Заполните все формы правильно!');
        };
        foreach ($tableColumns as $key) {
            $theme[$key] = $request->input($key);
        }
        $result = GroupSource::setGroupSource($theme);
        if (is_array($result)) {
            return back()->with($result['type'], $result['message']);
        }
        return redirect(route('account'))->with('success', 'Тема успешно создана!');
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
