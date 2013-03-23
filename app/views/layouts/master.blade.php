<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="/assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/assets/css/main.css">

        <script src="/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle brand" data-toggle="dropdown">Ignite
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/">Ignite</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#" id="run"><i class="icon-play icon-white"></i></a></li>
                            <li><a href="#about"><i class="icon-ok icon-white"></i></a></li>
                            <li><a href="#" id="options"><i class="icon-cog icon-white"></i></a></li>
                            <li class="dropdown">
                                <a href="#libraries" class="dropdown-toggle" data-toggle="dropdown">Libraries <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Add a Library</a></li>
                                    <li class="divider-vertical"></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                </ul>
                            </li>
                            {{--<li class="dropdown">
                                <a href="#languages" class="dropdown-toggle" data-toggle="dropdown">Language
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#php">PHP</a></li>
                                    <li><a href="#python">Python</a></li>
                                    <li><a href="#ruby">Ruby</a></li>
                                    <li><a href="#js">JavaScript</a></li>
                                </ul>
                            </li>--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Database
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#myModal" data-toggle="modal">Create</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#" class="nav-header">Databases</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">

            @yield('content')

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="/assets/js/vendor/bootstrap.min.js"></script>

        <script src="/assets/js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
