<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    {{--<link rel="stylesheet" href="{{asset('css/style/reboot.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/assets/css/material-kit.css')}}">
</head>
<body>
@include('layouts.header')
@include('layouts.content')
@include('layouts.footer')
<script src="{{asset('css/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/js/plugins/moment.min.js')}}" type="text/javascript"></script>
</body>
</html>