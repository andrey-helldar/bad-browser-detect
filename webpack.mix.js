let mix = require('laravel-mix');

const path = require('path');

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
    .webpackConfig({
        output: {
            path: path.resolve(__dirname, 'src/public')
        }
    })

    .sass(assets + 'sass/bad-browser.scss', 'css')

    .copyDirectory(assets + 'images', 'src/public/images')

    .options({
        processCssUrls: false
    })

    .disableNotifications();
