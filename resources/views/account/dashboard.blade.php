@extends('account.index')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Предмет</th>
            <th>Заголовок</th>
            <th>Группа/Курс</th>
            <th class="text-right">Прикреплённые файлы</th>
            <th class="text-right">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $source)
            <tr>
                <td class="text-center">{{$source->id}}</td>
                <td>{{$source->lesson}}</td>
                <td>{{$source->title}}</td>
                <td>{{$source->group}}/{{$source->course}}</td>
                <td class="text-right">{{$source->resource}}</td>
                <td class="td-actions text-right">
                    <div style="display: inline-flex">
                        <form action="{{url('panel/action/'.$source->id)}}" method="get" style="padding-right: 10px">
                            <button rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                            </button>
                            {{csrf_field()}}
                        </form>
                        <form action="{{url('panel/action/'.$source->id)}}" method="post" style="padding-right: 10px">
                            <button rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                            @method('put')
                            {{csrf_field()}}
                        </form>
                        <form action="{{url('panel/action/'.$source->id)}}" method="post">
                            <button rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </button>
                            @method('delete')
                            {{csrf_field()}}
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        {{--<tr>--}}
        {{--<td class="text-center">2</td>--}}
        {{--<td>John Doe</td>--}}
        {{--<td>Design</td>--}}
        {{--<td>2012</td>--}}
        {{--<td class="text-right">&euro; 89,241</td>--}}
        {{--<td class="td-actions text-right">--}}
        {{--<button type="button" rel="tooltip" class="btn btn-info btn-round">--}}
        {{--<i class="material-icons">person</i>--}}
        {{--</button>--}}
        {{--<button type="button" rel="tooltip" class="btn btn-success btn-round">--}}
        {{--<i class="material-icons">edit</i>--}}
        {{--</button>--}}
        {{--<button type="button" rel="tooltip" class="btn btn-danger btn-round">--}}
        {{--<i class="material-icons">close</i>--}}
        {{--</button>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td class="text-center">3</td>--}}
        {{--<td>Alex Mike</td>--}}
        {{--<td>Design</td>--}}
        {{--<td>2010</td>--}}
        {{--<td class="text-right">&euro; 92,144</td>--}}
        {{--<td class="td-actions text-right">--}}
        {{--<button type="button" rel="tooltip" class="btn btn-info btn-simple">--}}
        {{--<i class="material-icons">person</i>--}}
        {{--</button>--}}
        {{--<button type="button" rel="tooltip" class="btn btn-success btn-simple">--}}
        {{--<i class="material-icons">edit</i>--}}
        {{--</button>--}}
        {{--<button type="button" rel="tooltip" class="btn btn-danger btn-simple">--}}
        {{--<i class="material-icons">close</i>--}}
        {{--</button>--}}
        {{--</td>--}}
        {{--</tr>--}}
        </tbody>
    </table>
@endsection