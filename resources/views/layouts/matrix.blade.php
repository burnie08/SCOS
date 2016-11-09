<!DOCTYPE html>
<html lang="en">

<head>
    <title>Swim Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



    <link rel="stylesheet" href="/css/select2.css" />
    <link rel="stylesheet" href="/css/fullcalendar.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->


    <style>
        .navbar {
            min-height: inherit;
            border: none;
        }
        
        #user-nav > ul {
            border: none;
        }
        
        .table th {
            text-align: left;
        }
        
        .form-horizontal .control-label {
            padding-top: 15px;
            width: auto;
        }
        
        @media (max-width: 480px) {
            .form-horizontal .control-label {
                padding-left: 20px;
            }
        }
        
        @media (min-width: 992px) {
            .col-md-4.control-label {
                width: 33.33333333%;
            }
        }

    </style>
    
    <script src="/js/excanvas.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.ui.custom.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.flot.min.js"></script>
    <script src="/js/jquery.flot.resize.min.js"></script>
    <script src="/js/jquery.peity.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/js/matrix.js"></script>
    
    <script src="/js/jquery.gritter.min.js"></script>
    <script src="/js/matrix.interface.js"></script>
    <script src="/js/matrix.chat.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/matrix.form_validation.js"></script>
    <script src="/js/jquery.wizard.js"></script>
</head>

<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="/">Swim Admin</a></h1>
    </div>
    <!--close-Header-part-->

 @if (Auth::user())
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ Auth::user()->name }}</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
           
                @if (Auth::user()->hasRole('admin'))
                    <li class="dropdown" id="security"><a href="#" data-toggle="dropdown" data-target="" class="dropdown-toggle"><i class="icon icon-cog"></i> <span class="text">Security</span>  <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a class="sAdd" title="" href="/admin/users"><i class="icon-user"></i>Users</a></li>
                            <li class="divider"></li>
                            <li><a class="sInbox" title="" href="/admin/roles"><i class="icon-key"></i> Roles</a></li>
                            <li class="divider"></li>
                            <li><a class="sOutbox" title="" href="{{url('/admin/generator')}}"><i class="icon-plus"></i>Crud Generator</a></li>
                            <li class="divider"></li>

                        </ul>
                    </li>
                 @endif
           
            <li class=""><a title="" href="/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        </ul>
    </div>
    @endif
    <!--close-top-Header-menu-->
    <!--start-top-serch
    <div id="search">
        <input type="text" placeholder="Search here..." />
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    -->
    <!--close-top-serch-->
    <!--sidebar-menu-->
    @if (Auth::user())
         @if (Auth::user()->hasRole(['swim-admin','admin']))
        <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
            <ul>
             @if (Auth::user()->hasRole('admin'))
                <li id="sb-admin"><a href="/admin"><i class="icon icon-home"></i> <span>Security</span></a> </li>
              @endif
                <li id="sb-swim-admin"> <a href="/SwimAdmin/skill-cards"><i class="icon icon-th"></i> <span>Swim Admin</span></a> </li>
                <li id="sb-swim-instructor"> <a href="/search"><i class="icon icon-th"></i> <span>Swim Instructors</span></a> </li>
            </ul>
        </div>
        <!--sidebar-menu-->
        @endif
    @endif
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        @yield('dashboard')
            <!-- First Content Area -->
            <div class="row-fluid">

                @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>


                @endif @yield('content')
            </div>



           
    </div>

    <!--end-main-container-part-->

    <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
    </div>

    <!--end-Footer-part-->

    <!--end-Footer-part-->

    
    
   




    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage(newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-") {
                    resetMenu();
                }
                // else, send page to designated URL            
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }

    </script>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script>
    var baseURL = "{{URL::to('/')}}"

</script>


</html>
