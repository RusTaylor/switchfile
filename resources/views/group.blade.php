@extends('home')
@section('content')
    @foreach($materials as $material)
        <div style="color: white" >{{$material->material}}</div>
    @endforeach
    @endsection