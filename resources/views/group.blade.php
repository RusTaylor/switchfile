@extends('home')
@section('content')
    @foreach($materials as $material)

        <div class="card card-nav-tabs text-center" style="margin-top: 100px">
            <div class="card-header card-header-primary">
                {{$material->material}}
            </div>
            <div class="card-body">
                <h4 class="card-title">{{$material->title}}</h4>
                <p class="card-text">{{$material->description}}</p>
                <a href="{{url(Request::path().'/'.$material->to_way)}}" class="btn btn-primary">Перейти</a>
            </div>
        </div>
    @endforeach
    @endsection