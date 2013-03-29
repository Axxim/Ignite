<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/main.css">

        <script src="/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please
            <a href="http://browsehappy.com/">upgrade your browser</a> or
            <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your
            experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-fixed-top">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ignite</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="#" class="process"><span class="glyphicon glyphicon-play"></span></a></li>
                    <li class="dropdown">
                        <a href="#languages" class="dropdown-toggle" data-toggle="dropdown">Language
                            <b class="caret"></b></a>
                        <ul id="languageSelector" class="dropdown-menu">
                            @foreach(Language::all() as $language)
                            <li><a href="#{{$language->short}}" data-language-ace="{{$language->ace}}" class="language">{{$language->full}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#theme" class="dropdown-toggle" data-toggle="dropdown">Theme <b class="caret"></b></a>
                        <ul id="themeSelector" class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Light Themes</a>
                                <ul class="dropdown-menu">
                                    @foreach(Theme::where('type', '=', 'light')->get() as $theme)
                                    <li><a href="#{{$theme->name}}" data-theme-ace="{{$theme->ace}}" data-theme-type="{{$theme->type}}" class="theme">{{$theme->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Dark Themes</a>
                                <ul class="dropdown-menu">
                                    @foreach(Theme::where('type', '=', 'dark')->get() as $theme)
                                    <li><a href="#{{$theme->name}}" data-theme-ace="{{$theme->ace}}" data-theme-type="{{$theme->type}}" class="theme">{{$theme->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>

        <div id="content">

            <div class="pane ui-layout-center">
                @yield('content')

                <div id="editor">&lt;?php
// Welcome to Ignite
// Ignite is a new way to share, run and save code.
//
// You can get started by simply writing code, or pasting your
// existing code here. After that you can hit Play or Save.
// Playing code automatically compiles and saves it.
//
// If you find any problems feel free to join us on irc at
// irc.esper.net #axxim or email me at luke@axxim.net
//
// Site is copyright Axxim, LLC. Code is copyright the owner.

echo &quot;Hello, World!&quot;;
</div>
            </div>

            <div class="pane ui-layout-south">

                <div id="inspector">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab-ouput" data-toggle="tab">Output</a></li>
                        <li><a href="#tab-debug" data-toggle="tab">Debug</a></li>
                        <li><a href="#tab-console" data-toggle="tab">Console</a></li>
                        <li><a href="#tab-options" data-toggle="tab">Options</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-output">
                            <div id="output"></div>
                        </div>
                        <div class="tab-pane" id="tab-debug">...</div>
                        <div class="tab-pane" id="tab-console">
                            <div id="console"></div>
                        </div>
                        <div class="tab-pane" id="tab-options">...</div>
                    </div>
                </div>

            </div>

        </div>

        <div id="newLibrary" class="modal hide fade" tabindex="-1" role="dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Add a Library</h3>
            </div>
            <div class="modal-body">
                <p>Ignite takes advantage of the Composer and Packagist to provide awesome PHP libraries. At the moment
                    you have to enter the full package namespace.</p>

                <form id="composer" action="" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="composer-namespace">Package Namespace</label>

                        <div class="controls">
                            <input type="text" id="composer-namespace" name="namespace" placeholder="rmccue/requests">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Use Library</button>
            </div>
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

        <script src="/assets/js/vendor/bootstrap.min.js"></script>
        <script src="/assets/js/vendor/mustache.js"></script>
        <script src="/assets/js/vendor/ace/ace.js"></script>
        <script src="/assets/js/vendor/jquery.layout-latest.min.js"></script>

        <script src="/assets/js/ignite.js"></script>

        <script>
            var _gaq = [
                ['_setAccount', 'UA-XXXXX-X'],
                ['_trackPageview']
            ];
            (function (d, t) {
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s)
            }(document, 'script'));
        </script>
    </body>
</html>
