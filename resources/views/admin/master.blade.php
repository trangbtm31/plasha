<!DOCTYPE html>
<!-- saved from url=(0082)http://demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html -->
<html lang="en" class="perfect-scrollbar-on"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="apple-touch-icon" sizes="76x76" href="http://demos.creative-tim.com/material-dashboard-pro/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="http://demos.creative-tim.com/material-dashboard-pro/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="dist/css/admin/material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="dist/css/admin/demo.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="dist/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dist/css/admin/css.css">
    <link rel="stylesheet" type="text/css" href="dist/css/admin.css">
    {{--<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/2/intl/vi_ALL/common.js"></script>--}}
    {{--<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/2/intl/vi_ALL/util.js"></script>--}}
    {{--<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/2/intl/vi_ALL/stats.js"></script>--}}
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="images/admin/master/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <div class="logo">
            <a href="http://www.creative-tim.com/" class="simple-text">
                Creative Tim
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="http://www.creative-tim.com/" class="simple-text">
                Ct
            </a>
        </div>
        <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" data-ps-id="a1195d32-830c-c3bb-834a-b52a4a51b47e">
            <div class="user">
                <div class="photo">
                    <img src="images/users/{{ Auth::User()->user_info->avatar }}">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="http://demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html#collapseExample" class="collapsed">
                        {{ Auth::User()->first_name }} {{ Auth::User()->last_name }}
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">My Profile</a>
                            </li>
                            <li>
                                <a href="#">Edit Profile</a>
                            </li>
                            <li>
                                <a href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul id="main-menu" class="nav">
                <li>
                    <a href="/admin">
                        <i class="material-icons">assignment_ind</i>
                        <p>Administration manager</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="http://demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html#pagesExamples">
                        <i class="material-icons">room</i>
                        <p>Place
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="/add-new-place">Add New</a>
                            </li>
                            <li>
                                <a href="/all-place">All Place</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 525px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 311px;"></div></div></div>
        <div class="sidebar-background" style="background-image: url('images/admin/master/sidebar-1.jpg') "></div></div>
    @yield('content')
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="http://demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-blue" data-color="blue"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="text-center">
                        <span class="badge filter badge-white" data-color="white"></span>
                        <span class="badge filter badge-black active" data-color="black"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Mini</p>
                    <div class="togglebutton switch-sidebar-mini">
                        <label>
                            <input type="checkbox" unchecked=""><span class="toggle"></span>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Image</p>
                    <div class="togglebutton switch-sidebar-image">
                        <label>
                            <input type="checkbox" checked=""><span class="toggle"></span>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="images/admin/master/sidebar-1.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="images/admin/master/sidebar-2.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="images/admin/master/sidebar-3.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="images/admin/master/sidebar-4.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
</div>
</body>
<script>
    window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
</script>
<!--   Core JS Files   -->
<script src="js/jquery.min.js"></script>
<script src="dist/js/admin/lib/jquery-ui.min.js" type="text/javascript"></script>
<script src="dist/js/admin/lib/bootstrap.min.js"></script>
<script src="dist/js/admin/lib/material.min.js" type="text/javascript"></script>
<script src="dist/js/admin/lib/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="dist/js/admin/lib/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="dist/js/admin/lib/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="dist/js/admin/lib/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="dist/js/admin/lib/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="dist/js/admin/lib/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="dist/js/admin/lib/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="dist/js/admin/lib/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="dist/js/admin/lib/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="dist/js/admin/lib/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}
<!-- Select Plugin -->
<script src="dist/js/admin/lib/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="dist/js/admin/lib/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="dist/js/admin/lib/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="dist/js/admin/lib/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="dist/js/admin/lib/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="dist/js/admin/lib/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="dist/js/admin/lib/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="dist/js/admin/lib/demo.js"></script>
<script src="dist/js/admin/admin.js"></script>
</html>