<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />
  <script src="https://kit.fontawesome.com/7ffbc37317.js" crossorigin="anonymous"></script>


    <title>Blue Shark </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
  <link href="{{url('/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('/assets/vendors/font-awesome/css/font-awesome.min.css')}}"  rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('/assets/vendors/nprogress/nprogress.css ')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{url('/assets/vendors/iCheck/skins/flat/green.css')}}"  rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{url('/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{url('/assets/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('/assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{url('/assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
  <link href="{{url('/assets/css/custom.min.css')}}" rel="stylesheet">
  <link href="{{url('/assets/css/style.css')}}" rel="stylesheet">

  <!-- date picker -->
  <script src="{{url('/assets/vendors/jquery/dist/jquery.min.js')}}"></script>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script> --}}
 <style>
   .delete{
           border: 0;
           display: inline-block;
           color: #ff0000;
           background-color: transparent;
            }
    .edit{
    border: 0;
    display: inline-block;
    color: green;
    background-color: transparent;
    }
  </style>
  </head>

  <body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Blue Shark</span></a>
                </div>
    
                <div class="clearfix"></div>
    
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                  <img src="{{url('/')}}/uploads/{{Auth::user()->profileImage}}" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                  <h2>{{Auth::user()->firstName}}</h2>
                  </div>
                </div>
                <!-- /menu profile quick info -->
    
                <br />

 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          {{-- <h3>General</h3> --}}
          <ul class="nav side-menu">
          <li><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home </a></li>
              {{-- <ul class="nav child_menu"> --}}
                {{-- <li><a href="{{url('user')}}">Users</a></li>  --}}
                <br>
                <li><a><i class="fa fa-bullseye"></i>General<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('/sport')}}"><i class="fa fa-futbol"></i>Sports</a></li>
                <li><a href="{{url('/group')}}"><i class="fa fa-users"></i>Groups</a></li>
                <li><a href="{{url('/branch')}}"><i class="fa fa-building"></i>Branches</a></li>
                </ul>
                </li>
                
                <li><a><i class="fa fa-user"></i>CRM<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('/lead')}}"><i class="fa fa-bullseye"></i>Leads</a></li>
                <li><a href="{{url('/contact')}}"><i class="fa fa-asterisk"></i>Contacts</a></li>
                </ul>
                </li>
                
                <li><a><i class="fa fa-user"></i>Team <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('/trainer')}}"><i class="fa fa-certificate"></i>Trainers</a></li>
                <li><a href="{{url('/management')}}"><i class="fa fa-bar-chart"></i>Management Members</a></li>
                <li><a href="{{url('/marketing')}}"><i class="fa fa-money"></i> Marketing Members</a></li>
                </ul>
                </li>

                <li><a><i class="fa fa-circle"></i>Control <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('/schedule')}}"><i class="fa fa-calendar"></i>Schedule</a></li>
                </ul>
                </li>

                <li><a><i class="fa fa-bullhorn"></i>Attendance<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{url('/tAttendance')}}"><i class="fa fa-paperclip"></i>Trainers Attendance</a></li>
                  <li><a href="{{url('/mAttendance')}}"><i class="fa fa-paperclip"></i>Managers Attendance</a></li>
                  <li><a href="{{url('/marketerAttendance')}}"><i class="fa fa-paperclip"></i>Marketer Attendance</a></li>
                  <li><a href="{{url('/cAttendance')}}"><i class="fa fa-paperclip"></i>Contacts Attendance</a></li>
                  </ul>
                  </li>

                <li><a> <i class="fa fa-credit-card"></i>Accounting <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('/payment')}}"><i class="fa fa-credit-card"></i>Payments</a></li>
                <li><a href="{{url('/revenue')}}"><i class="fa fa-credit-card"></i>Other Revenue</a></li>
                <li><a href="{{url('/expense')}}"><i class="fa fa-credit-card"></i>Expenses</a></li>
                </ul>
                </li>

                <li><a> <i class="fa fa-file-text-o"></i>Reports<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{url('/accountingReports')}}"><i class="fa fa-paperclip"></i>Accounting Reports</a></li>
                  <li><a href="{{url('/managementReports')}}"><i class="fa fa-paperclip"></i>Management Reports</a></li>
                  <li><a href="{{url('/marketerReports')}}"><i class="fa fa-paperclip"></i>Marketers Reports</a></li>
                  <li><a href="{{url('/trainerReports')}}"><i class="fa fa-paperclip"></i>Trainers Reports</a></li>
                  <li><a href="{{url('/contactReports')}}"><i class="fa fa-paperclip"></i>Contacts Reports</a></li>
                  <!-- <li><a href="{{url('/revenuesReports')}}"><i class="fa fa-paperclip"></i>Revenues & Expenses</a></li> -->
                  </ul>
                  </li>
                
                <li><a><i class="fa fa-bar-chart"></i>Adminstration <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('/user')}}"><i class="fa fa-user"></i>Users</a></li>
                </ul>
                </li>

                
                
              {{-- </ul>
            </li> --}}
            {{-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="form.html">General Form</a></li>
                <li><a href="form_advanced.html">Advanced Components</a></li>
                <li><a href="form_validation.html">Form Validation</a></li>
                <li><a href="form_wizards.html">Form Wizard</a></li>
                <li><a href="form_upload.html">Form Upload</a></li>
                <li><a href="form_buttons.html">Form Buttons</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="general_elements.html">General Elements</a></li>
                <li><a href="media_gallery.html">Media Gallery</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="glyphicons.html">Glyphicons</a></li>
                <li><a href="widgets.html">Widgets</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="inbox.html">Inbox</a></li>
                <li><a href="calendar.html">Calendar</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tables.html">Tables</a></li>
                <li><a href="tables_dynamic.html">Table Dynamic</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="chartjs.html">Chart JS</a></li>
                <li><a href="chartjs2.html">Chart JS2</a></li>
                <li><a href="morisjs.html">Moris JS</a></li>
                <li><a href="echarts.html">ECharts</a></li>
                <li><a href="other_charts.html">Other Charts</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                <li><a href="fixed_footer.html">Fixed Footer</a></li>
              </ul>
            </li>
          </ul> --}}
        </div>
        <div class="menu_section">
          {{-- <h3>Live On</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="e_commerce.html">E-commerce</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="project_detail.html">Project Detail</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <li><a href="profile.html">Profile</a></li>
              </ul>
            </li> --}}
            {{-- <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="page_403.html">403 Error</a></li>
                <li><a href="page_404.html">404 Error</a></li>
                <li><a href="page_500.html">500 Error</a></li>
                <li><a href="plain_page.html">Plain Page</a></li>
                <li><a href="{{ route('login') }}">Login Page</a></li>
                <li><a href="pricing_tables.html">Pricing Tables</a></li>
              </ul>
            </li> --}}
            {{-- <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="#level1_1">Level One</a>
                  <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="level2.html">Level Two</a>
                      </li>
                      <li><a href="#level2_1">Level Two</a>
                      </li>
                      <li><a href="#level2_2">Level Two</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#level1_2">Level One</a>
                  </li>
              </ul>
            </li>                  
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li> --}}
          {{-- </ul> --}}
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{url('assets/production/images/img.jpg')}}" alt="">{{Auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="javascript:;"> Profile</a>
                <a class="dropdown-item"  href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
            <a class="dropdown-item"  href="javascript:;">Help</a>
              <a class="dropdown-item"  href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </div>
          </li>

          <li role="presentation" class="nav-item dropdown open">
            <a href="" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              @php
              $mesgs =\App\message::where('status','unread')->where('from','!=', Auth::id())->where('to',Auth::id())->count();
          @endphp
              <span class="badge bg-green">{{$mesgs}}</span>
            </a>
            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
              @php
              $messages =\App\message::where('from','!=', Auth::id())->where('to',Auth::id())->get();
          @endphp
          @foreach($messages as $message)
              <li class="nav-item">
                <a class="dropdown-item" href="{{url('message/'.$message['id'])}}">
               
                  <span class="image"><img src="{{url('assets/production/images/img.jpg')}}" alt="Profile Image" /></span>
                  <span>
                    <span>
                      <?php  $user = \App\User::where('id', $message->from)->first();  ?>
                      {{$user->name}}</span>
                  <span class="time">
                    {{$message->created_at->format('d/m/Y')}}
                    <br>
                    {{$message->created_at->toTimeString()}}
                  </span>
                  </span>
                  <span class="message">
                   {{-- {{$message->message}} --}}
                   {{ substr($message->message,0,10) }}.....
                  </span>
                  @endforeach
                </a>
              </li>

              <li class="nav-item">
                <div class="text-center">
                  <a class="dropdown-item"  href="{{url('/message')}}">
                    <strong>See All Messages</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->
  <div class="right_col" role="main">
    @if(count($errors) >0) <div class="alert alert-danger">{{ Html::ul($errors->all()) }}</div> @endif
      @yield('content')
  </div>
  <!-- footer content -->
  <footer class="footer mt-auto py-3">
        <div class="pull-right">
           &copy; {{date('Y')}} Powered by <a href="https://bluesoftec.com">Bluesoftec</a>
        </div>
        <div class="clearfix"></div>
      </footer>
          </div>





      <!-- jQuery -->
  <!-- Bootstrap -->
<script src="{{url('/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- FastClick -->
<script src="{{url('/assets/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
<script src="{{url('/assets/vendors/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
<script src="{{url('/assets/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
<script src="{{url('/assets/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
<script src="{{url('/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
<script src="{{url('/assets/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
<script src="{{url('/assets/vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
<script src="{{url('/assets/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{url('/assets/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{url('/assets/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{url('/assets/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{url('/assets/vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
<script src="{{url('/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{url('/assets/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{url('/assets/vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
<script src="{{url('/assets/vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
<script src="{{url('/assets/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{url('/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{url('/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
<script src="{{url('/assets/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{url('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

  <!-- Custom Theme Scripts -->
<script src="{{url('/assets/js/custom.min.js')}}/"></script>
<!-- date picker -->



    </body>
</html>