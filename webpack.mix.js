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

let assets = './src/resources/assets/';

mix
    .sass(assets + 'sass/bad-browser.scss', 'src/public/css')

    .copyDirectory(assets + 'images', 'src/public/images')

    .options({
        processCssUrls: false
    })

    .disableNotifications();

if (mix.inProduction()) {
    mix.sourceMaps();
}
