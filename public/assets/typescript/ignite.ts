/// <reference path="def/jquery.d.ts" />
/// <reference path="def/ace.d.ts" />
/// <reference path="def/jquery.layout.d.ts" />
/// <reference path="def/jquery.cookie.d.ts" />

interface IgniteIDocument {
    code: string;
    language: string;
    owner: string;
}

class Ignite {
    hello = 'world';

    process(fire) {
        console.log(fire);
        $.post('/api/process', fire, function(data) {
            if(data.status === false) alert(data.errors);

            inspector.output.write(data.stdout);
            inspector.debug.fill(data.debug);
        });
    }
}

class IgniteEditor {
    context:any;
    language:any;
    theme:any;

    constructor() {
        this.context = ace.edit("editor");

        // check for a saved cookie
        var language = $.cookie('language') || 'ace/mode/php';
        var theme = $.cookie('theme_ace') || 'ace/theme/crimson_editor';
        var type = $.cookie('theme_type') || 'light';

        this.setLanguage(language);
        this.setTheme(theme, type);


        // Let's setup some events!
        this.context.getSession().on('change', function (e) {
            fire.code = editor.context.getValue();
        });
    }

    setLanguage(language:string) {
        // Remove all other highlights
        $('.language').parent().removeClass('disabled');

        // Select new highlight
        $("a[data-language-ace='" + language + "']").parent().addClass('disabled');

        inspector.console.log('Changed Language: ' + language);

        $.cookie('language', language);

        this.context.getSession().setMode(language);
        this.language = language;
    }

    setTheme(theme:string, type:string) {
        // Remove all other highlights
        $('.theme').parent().removeClass('disabled');

        // Select new highlight
        $("a[data-theme-ace='" + theme + "']").parent().addClass('disabled');

        // Set theme light/dark Ignite theme
        if (type === 'light') {
            $('.navbar').removeClass('navbar-inverse');
        } else {
            $('.navbar').addClass('navbar-inverse');
        }

        inspector.console.log('Changed Theme: ' + theme);

        $.cookie('theme_ace', theme);
        $.cookie('theme_type', type);

        this.context.setTheme(theme);
        this.theme = theme;
    }

    layout() {
        $('#content').layout({
            south: {
                minSize: 200,
                maxSize: '80%',
                onopen_end: this.paint(),
                onhide_end: this.paint(),
                onresize_end: this.paint()
            }
        });
    }

    paint() {
        var inspectorHeight = $('#inspector').height();
        var pageHeight = $(document).height();
        var navHeight = $('.navbar').height();

        var newEditorHeight = inspectorHeight + navHeight - pageHeight;
        inspector.console.log(newEditorHeight);

        this.context.resize();
    }
}

module Inspector {
    export class Output {
        container:string;

        constructor(container:string) {
            this.container = container;
        }

        write(data: string) {
            $(this.container).text(data);
        }
    }
    export class Debug {
        container:string;

        constructor(container:string) {
            this.container = container;
        }

        fill(data: any) {
            // @todo
        }
    }
    export class Console {
        container:string;

        constructor(container:string) {
            this.container = container;
        }

        log(message:string) {
            var timestamp = Math.round((new Date()).getTime() / 1000);

            $(this.container).append('[' + timestamp + '] ' + message + '<br>');
        }

        error(message:string) {
            var timestamp = Math.round((new Date()).getTime() / 1000);

            $(this.container).append('<span style="color: red">[' + timestamp + '] ' + message + '</span><br>');
        }

        write(status:string, message:string) {
            if (status === 'log') {
                this.log(message);
            } else if (status === 'error') {
                this.error(message);
            }
        }

        clear() {
            $(this.container).text();
        }
    }
}

var inspector = {
    output: new Inspector.Output('#output'),
    debug: new Inspector.Debug('#debug'),
    console: new Inspector.Console('#console')
};

var editor = new IgniteEditor();
var ignite = new Ignite();
editor.layout();

var fire :IgniteIDocument = {
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

$('.process').click(function(event) {
    event.preventDefault();

    ignite.process(fire);
});

/* Bootstrap */
