<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('assets/css/alertify.min.css')}}">
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
<script src="{{asset('assets/js/core/alertify.min.js')}}" type="text/javascript"></script>
@include('layouts.messages')
</body>
</html>