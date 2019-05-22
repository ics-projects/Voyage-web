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
   .js('resources/js/vendor/bootstrap.min.js', 'public/js')
   .js('resources/js/vendor/jquery-2.2.4.min.js', 'public/js')
   .js('resources/js/easing.min.js', 'public/js')
   .js('resources/js/hoverIntent.js', 'public/js')
   .js('resources/js/jquery-ui.js', 'public/js')
   .js('resources/js/jquery.ajaxchimp.min.js', 'public/js')
   .js('resources/js/jquery.magnific-popup.min.js', 'public/js')
   .js('resources/js/jquery.nice-select.min.js', 'public/js')
   .js('resources/js/mail-script.js', 'public/js')
   .js('resources/js/main.js', 'public/js')
   .js('resources/js/owl.carousel.min.js', 'public/js')
   .js('resources/js/popper.min.js', 'public/js')
   .js('resources/js/superfish.min.js', 'public/js')
   .js('resources/js/jquery.seat-charts.js', 'public/js')
   .js('resources/js/home-page.js', 'public/js')
   .js('resources/js/pick-seat.js', 'public/js');
   // .styles('resources/css/*.css', 'public/css')
   // .sass('resources/sass/app.scss', 'public/css');
