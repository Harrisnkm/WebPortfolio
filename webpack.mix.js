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
   .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: true,
        // uglify: {
        //     parallel: 4, // Use multithreading for the processing
        //     uglifyOptions: {
        //         mangle: true,
        //         compress: false, // The slow bit
        //     }
        // }
    });
