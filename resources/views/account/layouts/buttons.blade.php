@if(Request::is('panel'))
<li class="nav-item active">
    @else
    <li class="nav-item">
@endif
    <a class="nav-link" href="{{url('panel/')}}/">
        <i class="material-icons">dashboard</i>
        <p>Доска</p>
    </a>
</li>
        <li class="nav-item active">
            <div class="container">
            <div class="btn-group" >
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Создать...
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item btn-info" href="#">Урок</a>
                    <a class="dropdown-item" href="#">Тему</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Нового пользователя</a>
                    {{--Сделать создание пользователя по статусу админа--}}
                </div>
            </div>
            </div>
</li>
