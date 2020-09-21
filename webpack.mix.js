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

 mix.styles('resources/bower_components/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

 mix.styles('resources/css/mycss.css', 'public/css/mycss.css');

 mix.copy('resources/bower_components/jquery/dist/jquery.min.js', 'public/js');

 mix.js('resources/bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js');

 mix.copy('resources/bower_components/font-awesome', 'public/css/font-awesome');

 mix.copy('resources/js/myjs.js', 'public/js');

 mix.js('resources/js/myjs.js', 'public/js/myjs1.js');
