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

mix.js('resources/js/myapps.js', 'public/js')

.sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    module: {
        rules: [{
            test: /\.js?$/,
            use: [{
                loader: 'babel-loader',
                options: mix.config.babel()
            }]
        }]
    }
});