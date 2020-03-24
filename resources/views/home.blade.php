<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/css/alertify.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{asset('assets/css/default.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/css/material-kit.css')}}">
</head>
<body>
@include('layouts.header')
@include('layouts.content')
@include('layouts.footer')
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material-kit.js')}}"></script>
<script src="{{asset('assets/js/core/alertify.min.js')}}" type="text/javascript"></script>
@include('layouts.messages')
</body>
</html>
