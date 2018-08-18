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

mix
    .js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .js('resources/assets/js/cms.js', 'public/js')
   .sass('resources/assets/sass/cms.scss', 'public/css')

   .js('resources/assets/element/js/app.js', 'public/starter/element/js')
   .sass('resources/assets/element/sass/app.scss', 'public/starter/element/css')
   ;
