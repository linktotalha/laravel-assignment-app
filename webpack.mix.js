const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        
    ]);

    mix.scripts([
        'resources/theme/js/bundle.js',
        'resources/theme/js/scripts.js',
        'resources/theme/js/gd-default.js',
    ], 'public/js/theme.js');

    mix.scripts([
        'resources/theme/js/jquery.min.js',
    ], 'public/js/jquery.min.js');

    mix.scripts([
        'resources/theme/js/toastr.min.js',
    ], 'public/js/toastr.js');

    mix.scripts([
        'resources/theme/js/jquery.dataTables.min.js',
    ], 'public/js/jquery.dataTables.js');


    mix.styles([
        'resources/theme/css/dashlite.css',
        'resources/theme/css/theme.css',
    ], 'public/css/theme.css');

    mix.styles([
        'resources/theme/css/toastr.css',
    ], 'public/css/toastr.css');

    mix.styles([
        'resources/theme/css/jquery.dataTables.min.css',
    ], 'public/css/jquery.dataTables.css');


