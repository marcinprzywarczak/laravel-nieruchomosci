const { js } = require('laravel-mix');
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
    .js('resources/js/property_types.js', 'public/js')
    .js('resources/js/offer_statuses.js', 'public/js')
    .js('resources/js/properties.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/form.scss', 'public/css')
    .sass('resources/sass/property_types.scss', 'public/css')
    .sass('resources/sass/offer_statuses.scss', 'public/css')
    .sass('resources/sass/properties.scss', 'public/css')
    .copy('resources/views/vendor/datatables/i18n/pl.json', 'public/vendor/datatables/i18n')
    .sourceMaps()
    .extract();
