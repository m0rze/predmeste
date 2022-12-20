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
mix.copyDirectory('resources/css/img', 'public/img');
mix.js('resources/js/admin/main.js', 'public/js/admin')
    .js('resources/js/admin/categories.js', 'public/js/admin')
    .js('resources/js/admin/pages.js', 'public/js/admin')
    .js('resources/js/admin/editor.js', 'public/js/admin')
    .js('resources/js/website/index.js', 'public/js/website')
    .sass('resources/css/admin/app.scss', 'public/css/admin', [
    ])
    // .sass('resources/css/website/app.scss', 'public/css', []);


