/// <reference path="def/jquery.d.ts" />
/// <reference path="def/ace.d.ts" />
/// <reference path="def/jquery.layout.d.ts" />

interface IgniteIDocument {
    content: string;
    language: string;
    owner: string;
}

class Ignite {
    hello = 'world';

    process() {
        $()
    }
}

class IgniteEditor {
    context:any;

    constructor() {
        this.context = ace.edit("editor");

        this.setLanguage("ace/mode/php");
        this.setTheme("ace/theme/crimson_editor", 'light');


        // Let's setup some events!
        this.context.getSession().on('change', function(e) {
            //IgniteDocument.events.push() = e;
        });
    }

    getLanguage() {
        var language = 'derp';

        return language;
    }
    setLanguage(language:string) {
        // Remove all other highlights
        $('.language').parent().removeClass('disabled');

        // Select new highlight
        $("a[data-language-ace='" + language + "']").parent().addClass('disabled');

        inspector.console.log('Changed Language: ' + language);

        this.context.getSession().setMode(language);
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


        this.context.setTheme(theme);
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
    }
    export class Debug {
        container:string;

        constructor(container:string) {
            this.container = container;
        }
    }
    export class Console {
        container:string;

        constructor(container:string) {
            this.container = container;
        }

        log(message: string) {
            var timestamp = Math.round((new Date()).getTime() / 1000);

            $(this.container).append('[' + timestamp + '] ' + message + '<br>');
        }
        error(message: string) {
            var timestamp = Math.round((new Date()).getTime() / 1000);

            $(this.container).append('<span style="color: red">[' + timestamp + '] ' + message + '</span><br>');
        }

        write(status: string, message:string) {
            if(status === 'log') {
                this.log(message);
            } else if(status === 'error') {
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

var IgniteDocument: IgniteIDocument = {
    content: editor.context.getValue(),
    language: null,
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


/* Bootstrap */