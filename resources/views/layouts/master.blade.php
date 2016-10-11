<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->

    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{URL::asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/icheck/flat/green.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/tamry/tamry.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/js/select2-4.0.3/dist/css/select2.min.css')}}" rel="stylesheet">


    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Tamry Shop</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @if (Auth::user()->hasRole('admin'))
                     @include ('layouts.partials.sidemenu')
                    @elseif (Auth::user()->hasRole('assistant'))
                     @include ('layouts.partials.sidemenuassistant')
                    @endif 
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                     @include ('layouts.partials.sidefooter')
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
           @include ('layouts.partials.navbar')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title" style="direction: rtl;">
                      {{--   <div class="title_left">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="بحث...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
 --}}                        <div class="title_right">
                            <h3>{{$title}}</h3>
                        </div>

                       
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                    
                                    @yield('content')
                          
                        </div>
                    </div>
                </div>
              

                <!-- footer content -->
                @include ('layouts.partials.footer')
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- chart js -->
    <script src="{{URL::asset('assets/js/chartjs/chart.min.js')}}"></script>
    <!-- bootstrap progress js -->
    <script src="{{URL::asset('assets/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <!-- icheck -->
    <script src="{{URL::asset('assets/js/icheck/icheck.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/custom.js')}}"></script>

   <!-- Datatables -->
    <script src="{{URL::asset('assets/js/datatables/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/js/datatables/tools/js/dataTables.tableTools.js')}}"></script>     

    <!-- moris js -->
    <script src="{{URL::asset('assets/js/moris/raphael-min.js')}}"></script>
    <script src="{{URL::asset('assets/js/moris/morris.js')}}"></script>
    <script src="{{URL::asset('assets/js/moris/example.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2-4.0.3/dist/js/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2-4.0.3/dist/js/i18n/ar.js')}}"></script>
    <script src="{{URL::asset('assets/js/tamry/tamry.js')}}"></script>

</body>

</html>