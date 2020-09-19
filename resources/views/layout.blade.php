<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Webmaker</title>
    <link rel="stylesheet" href="/css/style.css">
    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="/">Homepage</a></li>
                    <li><a href="about-me.html">ABOUT ME </a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
                <ul class="nav navbar-nav text-uppercase pull-right">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li><a href="/logout">Logout</a></li>
                    @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer-widget-section">
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2020 <a href="#">Blog, </a> Designed with <i
                            class="fa fa-heart"></i> by <a href="#">Webmaker</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/js/script.js"></script>
</body>
</html>
