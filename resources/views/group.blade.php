@extends('home')
@section('content')
    <div class="container justify-content-center">
    @foreach($materials as $material)

        <div class="card card-nav-tabs text-center" style="margin-top: 100px">
            <div class="card-header card-header-primary">
                {{$material->lesson}}
            </div>
            <div class="card-body">
                <h4 class="card-title">{{$material->title}}</h4>
                <p class="card-text">{{$material->description}}</p>
                <a href="{{url(Request::path().'/'.$material->id)}}" class="btn btn-primary">Перейти</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection
