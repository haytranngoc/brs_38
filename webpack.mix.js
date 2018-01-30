let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('resources/assets/css/business-frontpage.css', 'public/css/business-frontpage.css')
   .copy('resources/assets/css/sb-admin-2.css', 'public/css/sb-admin-2.css')
   .copy('resources/assets/css/metisMenu.css', 'public/css/metisMenu.css')
   .copy('resources/assets/js/sb-admin-2.js', 'public/js/sb-admin-2.js')
   .copy('resources/assets/js/metisMenu.js', 'public/js/metisMenu.js')
   .copy('resources/assets/images/', 'public/images')
   .copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/')
   .copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/')
   .copy('node_modules/jquery/dist/jquery.js', 'public/js');
