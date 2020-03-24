<?php

use App\Group;
use App\GroupData;
use App\GroupSource;
use Illuminate\Database\Eloquent\Collection;

/**
 * @var Collection $sources
 * @var GroupData $course
 * @var GroupSource $theme
 * @var Group $group
 */
?>
@extends('account.index')
@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <button rel="tooltip" type="button" class="btn btn-success mr-2" id="saveTheme">
                Сохранить
            </button>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <label for="groupName">Группа:</label>
                <select class="form-control" id="groupName">
                    <option value="{{$group->alias}}">{{$group->name}}</option>
                </select>
            </div>
            <div class="col-6">
                <label for="groupCourse">Курс:</label>
                <select class="form-control" id="groupCourse">
                    <option>{{$course->course}}</option>
                </select>
            </div>
        </div>
        <div class="row mt-5">
            <label for="">Предметы:</label>
        </div>
        <div class="row border-bottom">
        </div>
        {{--    Lessons inputs    --}}
        <div class="row mt-5 justify-content-center" id="lessons">
            <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input lesson-input" type="radio" name="inlineRadioOptions" id="targetedLesson"
                           value="{{$theme->lesson}}" checked>{{$theme->lesson}}
                    <span class="circle">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
        <div class="row border-bottom mt-5">
        </div>
        {{--    Inputs for text    --}}
        <div class="row mt-5 justify-content-center">
            <div class="col-6">
                <label for="title">Название:</label>
                <input type="text" class="form-control" placeholder="Тематика" name="title" id="title"
                       value="{{$theme->title}}">
            </div>
        </div>
        <div class="row mt-5">
            <div class="form-group col-12">
                <label class="ml-3" for="description">Описание</label>
                <textarea class="form-control" id="description" rows="5">{{$theme->description}}</textarea>
            </div>
        </div>
    </div>
    {{--  Table  --}}
    <div class="row justify-content-center col-3 mt-3 ml-4">
        <label for="">Файлы:</label>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="table-responsive col-9">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody id="filesTable">
                </tbody>
            </table>
            <div class="row mt-2 justify-content-end">
                <button rel="tooltip" type="button" class="btn btn-success mr-2 btn-new-file"
                        data-toggle="modal"
                        data-target="#modal-edit">
                    Добавить файл
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Редактирование файла</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <label for="fileTitle">Название:</label>
                                <input type="text" class="form-control" placeholder="..." name="title"
                                       id="fileTitle"
                                       value="">
                            </div>
                        </div>
                        <div class="row mt-5 border">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input mt-1" id="fileInput">
                                <label class="custom-file-label mt-1" id="filePath" for="fileInput">Файл не
                                    выбран</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-success" id="saveFileChanges" data-dismiss="modal">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/script/themeEdit.js')}}"></script>
@endsection
