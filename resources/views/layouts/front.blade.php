<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Site</title>
    <link rel="icon" href="images/unnamed.png">
    <link rel='stylesheet' href='{{asset('assets/css/fontawesome-all.min.css')}}' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel='stylesheet' href='{{asset('assets/css/bootstrap.min.css')}}' />
    <link rel='stylesheet' href='{{asset('assets/css/style.css')}}' />

    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
    <!--<link rel="stylesheet" href="css/jquery-ui.theme.css">-->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
</head>
<body data-spy="scroll" data-target="#bs-example-navbar-collapse-1">
    <nav  class="navbar navbar-default navbar-fixed-top" style="border: none; background: none;">
        <div class="container-fluid navbar ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" style="color: #fff; font-size: 20px;" href="#"><em>IT-Talent</em></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active " style="border-top:none;"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                    <li ><a href="#sec2">Services</a></li>
                    <li><a href="#sec3">About</a></li>
                    <li><a href="#sec4">Work</a></li>
                    <li><a href="#sec5">Contacts</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>



@yield('content')


    <div style="text-align:center; border: 1px solid #68A097 ;background-color: #68A097;">
        <ul class="social">
            <a href="#" class="active"><span><i class="fab fa-facebook-square awic"></i></span></a>
            <a href="#"><span><i class="fab fa-google awic"></i></span></a>
            <a href="#"><span><i class="fab fa-instagram awic"></i> </span></a>
            <a href="#"><span><i class="fab fa-linkedin-in awic"></i></span></a>
            <a href="#"><span><i class="fab fa-twitter awic"></i></span></a>
        </ul>
    </div>
    </div>
    <a href="#"><span class="nav navbar-right navbar-fixed-bottom"><img id="verev" src="assets/images/arrow-up-8-48 .png"></span></a>
    <!--end section 5-->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="js/jqueri.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCspLg4-TLv1pm7oLnUGSIjnTAlkpjqhX8&callback=initMap"
        async defer></script>
</body>
</html>