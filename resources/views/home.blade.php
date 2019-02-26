<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    {{--<link rel="stylesheet" href="{{asset('css/style/reboot.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/style/style.css')}}">
</head>
<body>
@extends('layouts.header')
@foreach($materials as $material)
    <p>{{$material->material}}</p>
@endforeach
@extends('layouts.footer')
</body>
</html>