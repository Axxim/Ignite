// Type definitions for jQuery Layout
// Project: http://layout.jquery-dev.net/
// Definitions by: Luke Strickland <luke@axxim.net>

///<reference path="jquery.d.ts" />


interface JQueryLayoutOptions {

}

interface JQueryLayoutStatic {
    (options: any): any;
}

interface JQuery {
    layout?: JQueryLayoutStatic;
}
