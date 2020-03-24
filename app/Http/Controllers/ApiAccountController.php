<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupData;
use App\GroupSource;
use App\Lesson;
use App\Service\File;
use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class ApiAccountController extends Controller
{
    /** @var File */
    private $fileService;

    public function __construct(File $fileService)
    {
        $this->fileService = $fileService;
    }

    public function getAllGroups()
    {
        $groups = Group::getAllGroups();
        return Response::json($groups);
    }

    public function getCoursesForGroup(Request $request)
    {
        $courses = GroupData::getCoursesForGroup($request->post('groupAlias'));
        return Response::json($courses->toArray());
    }

    public function getLessons(Request $request)
    {
        $lessons = Lesson::getLessonsForGroupCourse($request->post());
        return Response::json($lessons->toArray());
    }

    public function getFileData(Request $request)
    {
        $fileData = Source::find($request->post('fileId'));

        if (!empty($fileData)) {
            $fileData = $fileData->toArray();
        }

        return Response::json($fileData);
    }

    public function saveFileChanges(Request $request)
    {
        $source = Source::find($request->post('fileId'));

        if (empty($source)) {
            $source = new Source();
            $source->resource_id = $request->post('themeId');
        }

        $source->name_file = $request->post('fileName');

        $issetFile = $request->hasFile('file');

        if ($issetFile) {//TODO удаление сделать
            $source->deleteFile();
            $source->to_way = $this->fileService->saveFile($request->file('file'));
        }

        $source->save();

        return Response::json(['message' => 'Файл сохранён']);
    }

    public function getFiles(Request $request)
    {
        /** @var GroupSource $theme */
        $theme = GroupSource::find($request->post('themeId'));

        if (empty($theme)) {
            return Response::json([]); //TODO сделать ошибку
        }

        $sources = $theme->source()->get()->toArray();

        return Response::json($sources);
    }

    public function saveThemeChanges(Request $request)
    {

        /** @var GroupSource $theme */
        $theme = GroupSource::find($request->post('themeId'));

        if (empty($theme)) {
            return Response::json(['message' => 'Тема не найдена'], 400);
        }

        /** @var Group $group */
        $group = Group::where(['alias' => $request->post('group')])->get()->get(0);

        if (empty($group)) {
            return Response::json(['message' => 'Группа не найдена'], 400);
        }

        $course = GroupData::where(
            [
                'course' => $request->post('course'),
                'group_id' => $group->id
            ]
        )->get()->get(0);

        if (empty($course)) {
            return Response::json(['message' => 'Курс не найден'], 400);
        }

        if (
            empty($request->post('lesson'))
            || empty($request->post('themeTitle'))
            || empty($request->post('themeDescription'))
        ) {
            return Response::json(['message' => 'Не заполнены(-но) поля(-е): Предмет, Название, Описание'], 400);
        }

        $theme->setRawAttributes([
            'group_data_id' => $course->id,
            'lesson' => $request->post('lesson'),
            'title' => $request->post('themeTitle'),
            'description' => $request->post('themeDescription')
        ]);

        $theme->save();

        return Response::json(['message' => 'Тема обновлена']);
    }

    public function deleteFile(Request $request)
    {
        /** @var Source $file */
        $file = Source::find($request->post('fileId'));

        if (empty($file)) {
            return Response::json(['message' => 'Файл не найден'], 400);
        }

        $file->deleteFile();
        $file->delete();

        return Response::json(['message' => 'Файл удалён']);
    }

    public function deleteTheme(Request $request)
    {
        /** @var GroupSource $theme */
        $theme = GroupSource::find($request->post('themeId'));

        if (empty($theme)) {
            return Response::json(['message' => 'Тема не найдена'], 400);
        }

        $files = $theme->source()->get();


        $files->each(function ($file) {
            $file->deleteFile();
            $file->delete();
        });

        $theme->delete();

        return Response::json(['message' => 'Тема удалена. Страница будет перезагружена через 2 секунды']);
    }
}
