<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    {{--<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="{{asset('css/assets/dashboard/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/assets/css/alertify.min.css')}}">
    <script src="{{asset('css/assets/js/core/alertify.min.js')}}" type="text/javascript"></script>

</head>
<body>
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                @include('account.layouts.buttons')
                <!-- your sidebar here -->
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                            </a>
                        </li>
                        <!-- your navbar here -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
                <!-- your footer here -->
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('css/assets/dashboard/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/dashboard/js/core/popper.min.js')}}}" type="text/javascript"></script>
<script src="{{asset('css/assets/dashboard/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('css/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('css/assets/js/plugins/moment.min.js')}}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Chartist JS -->
<script src="{{asset('')}}assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
{{--<script src="assets/js/plugins/bootstrap-notify.js"></script>--}}
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('css/assets/dashboard/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
@include('layouts.messages')
</body>
</html>