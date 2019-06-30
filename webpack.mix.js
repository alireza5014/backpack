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

<<<<<<< HEAD
mix.react('resources/assets/js/app.js', 'public/js')
=======
mix.js('resources/assets/js/app.js', 'public/js')
>>>>>>> 569c24237690ea19ad086d61ab01e55867e26496
   .sass('resources/assets/sass/app.scss', 'public/css');
