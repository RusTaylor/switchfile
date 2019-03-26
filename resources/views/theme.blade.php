@extends('home')
@section('content')
    @foreach($sources as $source)
    <div class="card" style="width: 25rem;float: left;margin-left: 25px">
        <div class="card-body">
            <h4 class="card-title">{{$source->name_file}}</h4>
            <a href="#0" class="card-link"><button type="button" class="btn btn-info">Предпросмотр</button></a>
            <a href="#0" class="card-link"><button class="btn btn-social btn-fill btn-google">
                    <i class="fa fa-google-square"></i> Скачать</button></a>
        </div>
    </div>
    @endforeach
    @endsection