const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------

 |By default, Laravel Mix and Webpack will find example.png, copy it to your public/images folder, and then rewrite the url() within your generated stylesheet. As such, your compiled CSS will be.

|As useful as this feature may be, it's possible that your existing folder structure is already configured in a way you like. If this is the case, you may disable url() rewriting like so:
 |
 */

mix.js('resources/admin/js/override.js', 'public/backend/js/override.js')
    .sass('resources/admin/sass/override.scss', 'public/backend/css/override.css')
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}

mix.disableNotifications();
