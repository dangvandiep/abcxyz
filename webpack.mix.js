const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.js('resources/js/auth/app.js', 'public/js/auth').extract(['axios', 'vue']);

mix.sass('resources/sass/auth.scss', 'public/css').options({
  processCssUrls: false,
  postCss: [
    require('postcss-css-variables')(),
    require('tailwindcss'),
  ],
}).purgeCss({
  folders: [
    path.join(__dirname, 'resources/js/auth'),
  ],
});

mix.version();
mix.disableNotifications();
