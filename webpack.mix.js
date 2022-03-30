let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'web/js');
mix.sass('resources/scss/app.scss', 'web/css');

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'web/fonts');

