<?php
$groupsAndCourses = App\Http\Controllers\HtmlGenerateController::generateHeader()
?>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Главная(Тестовая версия)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    @auth
                        <a class="nav-link" href="{{url('panel')}}">{{Auth::user()->name}}<span class="sr-only">(current)</span></a>
                    @else
                        <a class="nav-link" href="{{url('/login')}}">Войти<span class="sr-only">(current)</span></a>
                    @endauth
                </li>

                @foreach($groupsAndCourses as $groupAndCourses)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" style="font-size: 14px" id="navbarDropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Группа {{$groupAndCourses->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($groupAndCourses->groupCourses as $courses)
                                <a class="dropdown-item" href="{{url($groupAndCourses->alias.'/'.$courses->course)}}">
                                    {{$groupAndCourses->name}}-{{$courses->course}}</a>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
