<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{Request::root()}}" style="font-size: 15px">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-size: 15px" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Группа КСК
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('ksk/2')}}">КСК-2</a>
                        <a class="dropdown-item" href="{{url('ksk/3')}}">КСК-3</a>
                        <a class="dropdown-item" href="{{url('ksk/4')}}">КСК-4</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-size: 15px" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Группа РА
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('ra/2')}}">РА-2</a>
                        <a class="dropdown-item" href="{{url('ra/3')}}">РА-3</a>
                        <a class="dropdown-item" href="{{url('ra/4')}}">РА-4</a>
                    </div>
                </li>
            </ul>
            @auth
                 <span class="navbar-text">
                    <a class="nav-link" href="{{url('panel')}}">{{Auth::user()->name}}</a>
                </span>
                @else
                <span class="navbar-text">
                    <a class="nav-link" href="{{url('/login')}}">Log in</a>
                </span>
            @endauth
        </div>
    </div>
</nav>