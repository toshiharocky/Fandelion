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
    .scripts(['resources/js/jquery-3.6.0.min.js',
         'resources/js/jquery-migrate-3.3.2.min.js',
         'resources/js/mmenu.min.js',
         'resources/js/chosen.min.js',
         'resources/js/slick.min.js',
         'resources/js/rangeslider.min.js',
         'resources/js/magnific-popup.min.js',
         'resources/js/waypoints.min.js',
         'resources/js/counterup.min.js',
         'resources/js/jquery-ui.min.js',
         'resources/js/tooltips.min.js',
         'resources/js/custom.js',
         'resources/js/moment.min.js',
         'resources/js/daterangepicker.js',
         ]
         , 'public/js/all.js')
    .scripts('resources/js/quantityButtons.js', 'public/js/quantityButtons.js')
    .scripts('resources/js/switcher.js', 'public/js/switcher.js')
    .scripts('resources/js/infobox.min.js', 'public/js/infobox.min.js')
    .scripts('resources/js/markerclusterer.js', 'public/js/markerclusterer.js')
    .scripts('resources/js/maps.js', 'public/js/maps.js')
    .scripts('resources/js/leaflet.min.js', 'public/js/leaflet.min.js')
    .scripts('resources/js/leaflet-markercluster.min.js', 'public/js/leaflet-markercluster.min.js')
    .scripts('resources/js/leaflet-gesture-handling.min.js', 'public/js/leaflet-gesture-handling.min.js')
    .scripts('resources/js/leaflet-listeo.js', 'public/js/leaflet-listeo.js')
    .scripts('resources/js/leaflet-autocomplete.js', 'public/js/leaflet-autocomplete.js')
    .scripts('resources/js/leaflet-control-geocoder.js', 'public/js/leaflet-control-geocoder.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles(['resources/css/style.css', 'resources/css/main-color.css'], 'public/css/all.css')
    .options({
        processCssUrls: false
    });