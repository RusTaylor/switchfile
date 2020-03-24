@extends('account.index')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Предмет</th>
            <th>Заголовок</th>
            <th>Группа-Курс</th>
            <th class="text-right">Прикреплённые файлы</th>
            <th class="text-right">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groupSources as $index => $groupSource)
            <tr>
                <td class="text-center">{{$index + 1}}</td>
                <td>{{$groupSource->lesson}}</td>
                <td>{{$groupSource->title}}</td>
                <td>{{$groupSource->groupName}}-{{$groupSource->course}}</td>
                <td class="text-right">{{$groupSource->sources}}</td>
                <td class="td-actions text-right">
                    <div style="display: inline-flex">
                        <a href="{{url('panel/edit/'.$groupSource->id)}}">
                            <button rel="tooltip" class="btn btn-success mr-2">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button rel="tooltip" class="btn btn-danger btn-delete-theme"
                                data-themeId="{{$groupSource->id}}">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$groupSources->links()}}
    <script src="{{asset('js/script/dashboard.js')}}"></script>
@endsection
