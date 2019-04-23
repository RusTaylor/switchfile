@extends('account.index')
@section('content')
<div class="container">
    <form action="{{route('create_theme')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Выберите группу:</h4>
                        <p class="category">Выберите группу для которой вы хотите создать тему</p>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-check-radio form-check-inline" style="margin-left: 33%">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="group" id="Group" value="ksk"> КСК
                                <span class="circle">
        <span class="check"></span>
    </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="group" id="Group" value="ra"> РА
                                <span class="circle">
        <span class="check"></span>
    </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Выберите курс:</h4>
                        <p class="category">Выберите курс группы для которой вы хотите создать тему</p>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-check-radio form-check-inline" style="margin-left: 33%">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="course" id="Course" value="2"> 2
                                <span class="circle">
        <span class="check"></span>
    </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="course" id="Course" value="3"> 3
                                <span class="circle">
        <span class="check"></span>
    </span>
                            </label>
                        </div>
                        <div class="form-check form-check-radio form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="course" id="Course" value="4"> 4
                                <span class="circle">
        <span class="check"></span>
    </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Выберите предмет:</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-check-radio form-check-inline"
                             style="margin-left: 10%; display: block">
                            @foreach($lessons as $lesson)
                                <br>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="lesson" id="Lesson"
                                           value="{{$lesson->lesson_name}}"> {{$lesson->lesson_name}}
                                    <span class="circle">
        <span class="check"></span>
    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Тематика:</h4>
                        <p class="category">Кратко напишите какие файлы будет лежать в этой теме.<br><h4>Максимум 64 символа</h4></p>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Тематика" name="title">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Описание:</h4>
                        <p class="category">Дополнительное описание.<br><h4>Максимум 255 символов</h4></p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Описание</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="text-align: center">
            <button type="submit" class="btn btn-success" name="create_theme">Создать</button>
        </div>
    </form>
</div>
    @endsection