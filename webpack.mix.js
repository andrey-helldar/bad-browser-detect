let mix = require('laravel-mix');
let path = require('path');

const assets = './src/resources/assets/';

mix
    .webpackConfig({
        output: {
            path: path.resolve(__dirname, 'src/public')
        }
    })

    .options({
        processCssUrls: false,
        purifyCss: {
            paths: ['./src/resources/views/**.blade.php'],
            purifyOptions: {
                whitelist: ['*browser*']
            }
        }
    })

    .sass(assets + 'sass/bad-browser.scss', 'css')

    .copyDirectory(assets + 'images', 'src/public/images')

    .disableNotifications();
