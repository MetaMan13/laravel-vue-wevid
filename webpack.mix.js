const mix = require('laravel-mix');
const path = require('path');

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

mix.alias({
    '@forms': path.resolve(__dirname, 'resources/js/Components/Shared/Forms')
})

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .browserSync({
        proxy: '127.0.0.1:8000',
        notify: false,
        open: false,
    })
    .sourceMaps()
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
