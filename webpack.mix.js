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

mix.js('resources/js/admin/main.js', 'public/js/admin')
    .js('resources/js/website/main.js', 'public/js/website')
    .sass('resources/css/admin/app.scss', 'public/css/admin', [
    ])
    .sass('resources/css/website/app.scss', 'public/css/website', [
    ]);
mix.copyDirectory('resources/img', 'public/img');

