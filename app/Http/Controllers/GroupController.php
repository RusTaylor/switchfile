<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupSource;
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

    public function viewBlankCreateTheme()
    {
        $groups = Group::all();
        return view('account.create.theme', compact('groups')); //доделать вид страницы создания темы
    }

    public function actionCreateTheme(Request $request)
    {
        try {
            $this->validator($request->all())->validate();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Заполните все формы правильно!');
        };
        $result = GroupSource::setGroupSource(collect($request->post()));
        if ($result['type'] == 'success') {
            return redirect(route('account'))->with($result['type'], $result['message']);
        }
        return back()->with($result['type'], $result['message']);
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
