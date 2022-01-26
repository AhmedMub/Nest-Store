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

mix.sass('resources/sass/vendors_css.scss', 'public/backend/css/test.css')
    // .sass('resources/sass/style.scss', 'public/backend/css/style.css')
    // .sass('resources/sass/style_rtl.scss', 'public/backend/css/style_rtl.css')
    // .sass('resources/sass/color_theme.scss', 'public/backend/css/color_theme.css')
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
