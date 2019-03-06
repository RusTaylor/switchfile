@extends('home')
@section('content')
    @foreach($sources as $source)
    <p>{{$source->name_file}}</p>
    @endforeach
    @endsection