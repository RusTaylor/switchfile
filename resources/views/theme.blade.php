@extends('home')
@section('content')
    <div class="container justify-content-center">
    @foreach($sources as $source)
        <div class="card" style="width: 25rem;float: left;margin-left: 25px">
            <div class="card-body">
                <h4 class="card-title">{{$source->name_file}}</h4>
                    <button type="button" class="btn btn-disabled">Предпросмотр</button>
                <a href="/storage/{{$source->to_way}}" class="card-link">
                    <button class="btn btn-social btn-fill btn-success">
                        <i class="fa fa-google-square"></i> Скачать
                    </button>
                </a>
            </div>
        </div>
    @endforeach
    </div>
@endsection
