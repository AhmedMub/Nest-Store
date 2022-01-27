const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------

 |By default, Laravel Mix and Webpack will find example.png, copy it to your public/images folder, and then rewrite the url() within your generated stylesheet. As such, your compiled CSS will be.

|As useful as this feature may be, it's possible that your existing folder structure is already configured in a way you like. If this is the case, you may disable url() rewriting like so:
 |
 */

mix.js('resources/admin/js/custom.js', 'public/backend/js/custom.js')
    .sass('resources/frontend/sass/custom.scss', 'public/frontend/css/custom.css')
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
