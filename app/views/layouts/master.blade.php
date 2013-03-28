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
                    <li><a href="#"><span class="glyphicon glyphicon-play"></span></a></li>
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


                            <!--
                            <select id="theme" size="1">
                                <optgroup label="Bright">
                                    <li><a href="#ace/theme/chrome">Chrome</a></li>
                                    <li><a href="#ace/theme/clouds">Clouds</a></li>
                                    <li><a href="#ace/theme/crimson_editor">Crimson Editor</a></li>
                                    <li><a href="#ace/theme/dawn">Dawn</a></li>
                                    <li><a href="#ace/theme/dreamweaver">Dreamweaver</a></li>
                                    <li><a href="#ace/theme/eclipse">Eclipse</a></li>
                                    <li><a href="#ace/theme/github">GitHub</a></li>
                                    <li><a href="#ace/theme/solarized_light">Solarized Light</a></li>
                                    <li><a href="#ace/theme/textmate" selected="selected">TextMate</a></li>
                                    <li><a href="#ace/theme/tomorrow">Tomorrow</a></li>
                                    <li><a href="#ace/theme/xcode">XCode</a></li>
                                </optgroup>
                                <optgroup label="Dark">
                                    <option value="ace/theme/ambiance">Ambiance</option>
                                    <option value="ace/theme/chaos">Chaos</option>
                                    <option value="ace/theme/clouds_midnight">Clouds Midnight</option>
                                    <option value="ace/theme/cobalt">Cobalt</option>
                                    <option value="ace/theme/idle_fingers">idleFingers</option>
                                    <option value="ace/theme/kr_theme">krTheme</option>
                                    <option value="ace/theme/merbivore">Merbivore</option>
                                    <option value="ace/theme/merbivore_soft">Merbivore Soft</option>
                                    <option value="ace/theme/mono_industrial">Mono Industrial</option>
                                    <option value="ace/theme/monokai">Monokai</option>
                                    <option value="ace/theme/pastel_on_dark">Pastel on dark</option>
                                    <option value="ace/theme/solarized_dark">Solarized Dark</option>
                                    <option value="ace/theme/twilight">Twilight</option>
                                    <option value="ace/theme/tomorrow_night">Tomorrow Night</option>
                                    <option value="ace/theme/tomorrow_night_blue">Tomorrow Night Blue</option>
                                    <option value="ace/theme/tomorrow_night_bright">Tomorrow Night Bright</option>
                                    <option value="ace/theme/tomorrow_night_eighties">Tomorrow Night 80s</option>
                                    <option value="ace/theme/vibrant_ink">Vibrant Ink</option>
                                </optgroup>
                            </select>
                            -->
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>

        <div id="content">

            <div class="pane ui-layout-center">
                @yield('content')

                <div id="editor"><?php echo htmlentities(file_get_contents('https://raw.github.com/ircmaxell/PHPPHP/master/lib/PHPPHP/PHP.php')); ?>
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
