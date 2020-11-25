const mix = require('laravel-mix');

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
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
//FrontEnd Styles + JS
mix.styles(['resources/css/style.css', 'resources/css/sign.css', 'resources/css/style_add.css'],'public/css/style.css');
mix.styles('resources/css/slick.css','public/css/slick.css');
mix.js(['resources/js/main.js' , 'resources/js/tooltips.js'], 'public/js');
mix.copy('resources/js/slick.min.js', 'public/js/slick.min.js');
mix.copyDirectory('resources/img', 'public/img');
mix.copyDirectory('resources/js/tinymce', 'public/js/tinymce');
