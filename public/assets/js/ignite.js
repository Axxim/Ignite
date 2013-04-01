var Ignite = (function () {
    function Ignite() {
        this.hello = 'world';
    }
    Ignite.prototype.process = function (fire) {
        console.log(fire);
        $.post('/api/process', fire, function (data) {
            if(data.status === false) {
                alert(data.errors);
            }
            inspector.output.write(data.stdout);
            inspector.debug.fill(data.debug);
        });
    };
    return Ignite;
})();
var IgniteEditor = (function () {
    function IgniteEditor() {
        this.context = ace.edit("editor");
        var language = $.cookie('language') || 'ace/mode/php';
        var theme = $.cookie('theme_ace') || 'ace/theme/crimson_editor';
        var type = $.cookie('theme_type') || 'light';
        this.setLanguage(language);
        this.setTheme(theme, type);
        this.context.getSession().on('change', function (e) {
            fire.code = editor.context.getValue();
        });
    }
    IgniteEditor.prototype.setLanguage = function (language) {
        $('.language').parent().removeClass('disabled');
        $("a[data-language-ace='" + language + "']").parent().addClass('disabled');
        inspector.console.log('Changed Language: ' + language);
        $.cookie('language', language);
        this.context.getSession().setMode(language);
        this.language = language;
    };
    IgniteEditor.prototype.setTheme = function (theme, type) {
        $('.theme').parent().removeClass('disabled');
        $("a[data-theme-ace='" + theme + "']").parent().addClass('disabled');
        if(type === 'light') {
            $('.navbar').removeClass('navbar-inverse');
        } else {
            $('.navbar').addClass('navbar-inverse');
        }
        inspector.console.log('Changed Theme: ' + theme);
        $.cookie('theme_ace', theme);
        $.cookie('theme_type', type);
        this.context.setTheme(theme);
        this.theme = theme;
    };
    IgniteEditor.prototype.layout = function () {
        $('#content').layout({
            south: {
                minSize: 200,
                maxSize: '80%',
                onopen_end: this.paint(),
                onhide_end: this.paint(),
                onresize_end: this.paint()
            }
        });
    };
    IgniteEditor.prototype.paint = function () {
        var inspectorHeight = $('#inspector').height();
        var pageHeight = $(document).height();
        var navHeight = $('.navbar').height();
        var newEditorHeight = inspectorHeight + navHeight - pageHeight;
        inspector.console.log(newEditorHeight);
        this.context.resize();
    };
    return IgniteEditor;
})();
var Inspector;
(function (Inspector) {
    var Output = (function () {
        function Output(container) {
            this.container = container;
        }
        Output.prototype.write = function (data) {
            $(this.container).text(data);
        };
        return Output;
    })();
    Inspector.Output = Output;    
    var Debug = (function () {
        function Debug(container) {
            this.container = container;
        }
        Debug.prototype.fill = function (data) {
        };
        return Debug;
    })();
    Inspector.Debug = Debug;    
    var Console = (function () {
        function Console(container) {
            this.container = container;
        }
        Console.prototype.log = function (message) {
            var timestamp = Math.round((new Date()).getTime() / 1000);
            $(this.container).append('[' + timestamp + '] ' + message + '<br>');
        };
        Console.prototype.error = function (message) {
            var timestamp = Math.round((new Date()).getTime() / 1000);
            $(this.container).append('<span style="color: red">[' + timestamp + '] ' + message + '</span><br>');
        };
        Console.prototype.write = function (status, message) {
            if(status === 'log') {
                this.log(message);
            } else if(status === 'error') {
                this.error(message);
            }
        };
        Console.prototype.clear = function () {
            $(this.container).text();
        };
        return Console;
    })();
    Inspector.Console = Console;    
})(Inspector || (Inspector = {}));
var inspector = {
    output: new Inspector.Output('#output'),
    debug: new Inspector.Debug('#debug'),
    console: new Inspector.Console('#console')
};
var editor = new IgniteEditor();
var ignite = new Ignite();
editor.layout();
var fire = {
    code: editor.context.getValue(),
    language: editor.language.split("/").pop(),
    owner: 'anonymous'
};
$('.language').click(function (event) {
    event.preventDefault();
    var newLanguage = $(this).attr('data-language-ace');
    editor.setLanguage(newLanguage);
});
$('.theme').click(function (event) {
    event.preventDefault();
    var newTheme = $(this).attr('data-theme-ace');
    var themeType = $(this).attr('data-theme-type');
    editor.setTheme(newTheme, themeType);
});
$('.process').click(function (event) {
    event.preventDefault();
    ignite.process(fire);
});
KeyboardJS.on('ctrl + enter', function () {
    $('.process').click();
});
