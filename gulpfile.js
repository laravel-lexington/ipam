//TODO set gulp watchers
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(function(mix) {
//     mix.sass('app.scss');
// });

elixir(function(mix){

    mix.styles('toolkit-inverse.css');
    mix.styles('toolkit-light.css');
    mix.styles('application.css');

    //remember to place fonts in public/fonts and in public/build/fonts

    mix.copy('resources/assets/fonts/toolkit-entypo.eot', 'public/build/fonts/toolkit-entypo.eot');
    mix.copy('resources/assets/fonts/toolkit-entypo.ttf', 'public/build/fonts/toolkit-entypo.ttf');
    mix.copy('resources/assets/fonts/toolkit-entypo.woff', 'public/build/fonts/toolkit-entypo.woff');
    mix.copy('resources/assets/fonts/toolkit-entypo.woff2', 'public/build/fonts/toolkit-entypo.woff2');

    mix.scripts('jquery.min.js');
    mix.scripts('chart.js');
    mix.scripts('tablesorter.min.js');
    mix.scripts('toolkit.js');
    mix.scripts('application.js');

    mix.version([
        'css/toolkit-inverse.css',
        'css/toolkit-light.css',
        'css/application.css',
        'js/jquery.min.js',
        'js/chart.js',
        'js/tablesorter.min.js',
        'js/toolkit.js',
        'js/application.js'
    ])

});
