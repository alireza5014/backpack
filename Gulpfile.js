var elixir = require('laravel-elixir-webpack-react');

// npm install --save-dev browser-sync

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

elixir(function (mix) {
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.ttf', 'public/fonts/bootstrap/glyphicons-halflings-regular.ttf')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.woff', 'public/fonts/bootstrap/glyphicons-halflings-regular.woff')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.woff2', 'public/fonts/bootstrap/glyphicons-halflings-regular.woff2')
        .copy('node_modules/vue/dist/vue.js', 'resources/assets/js/libs/vue.js')
        .copy('node_modules/vue-resource/dist/vue-resource.js', 'resources/assets/js/libs/vue-resource.js')
        .copy('node_modules/jquery/dist/jquery.js', 'resources/assets/js/libs/jquery.js')
        .copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 'resources/assets/js/libs/bootstrap.js')
        .copy('node_modules/dropzone/dist/dropzone.js', 'resources/assets/js/libs/dropzone.js')
        .copy('node_modules/dropzone/dist/dropzone.css', 'resources/assets/sass/libs/dropzone.scss')
        .copy('node_modules/sweetalert/dist/sweetalert-dev.js', 'resources/assets/js/libs/sweetalert.js')
        .copy('node_modules/sweetalert/dist/sweetalert.css', 'resources/assets/sass/libs/sweetalert.scss')

        .scripts([
            'resources/assets/js/libs/vue.js',
            'resources/assets/js/libs/vue-resource.js',
            'resources/assets/js/libs/jquery.js',
            'resources/assets/js/libs/bootstrap.js',
            'resources/assets/js/libs/dropzone.js',
            'resources/assets/js/libs/sweetalert.js',
            'resources/assets/js/app.js',
        ], 'public/js/app.js')

        .sass('app.scss')

        .browserSync({ proxy: 'laravel.dev', open: false });

});
