<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('pageTitle')-App Name</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- This was clashing
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
-->

    <style>
        nav ul a {
            font-size: 15px;
        }
        /* Remove the navbar's default margin-bottom and rounded borders */
        
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        
        .row.content {
            height: 450px
        }
        /* Set gray background color and 100% height */
        
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }
        /* Set black background color, white text and some padding */
        
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }
        /* On small screens, set height to 'auto' for sidenav and grid */
        
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {
                height: auto;
            }
        }
        
        .panel-heading {
            font-size: 20px;
        }
        
        .form-group label {
            font-size: 14px;
        }

    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>

    </script>
</head>

<body>

    <nav class="navbar navbar-inverse" style="z-index:100;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    @if (!Auth::guest()) @if(Auth::user()->hasRole('admin'))
                    <li><a href="/admin/skill-cards">Skill Cards</a></li>
                    @endif @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">

            <div class="col-sm-12 text-left">
                @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
                @endif @yield('content')
            </div>

        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script>
    var baseURL = "{{URL::to('/')}}"

</script>
<script src="{{ URL::asset('js/AjaxisMaterialize.js')}}"></script>
<script src="{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>

</html>
