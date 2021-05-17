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
    .js('resources/js/myChart.js', 'public/css')
    .postCss('resources/css/welcome.css', 'public/css')
    .postCss('resources/css/myChart.css', 'public/css')
    .postCss('resources/css/questionnaire.css', 'public/css')
    .postCss('resources/css/create-user.css', 'public/css')
    .postCss('resources/css/sb-admin-2.min.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
