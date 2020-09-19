const mix = require('laravel-mix');

mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/font-awesome.min.css',
    'resources/css/animate.min.css',
    'resources/css/owl.carousel.css',
    'resources/css/owl.theme.css',
    'resources/css/owl.transitions.css',
    'resources/css/style.css',
    'resources/css/responsive.css'
], 'public/css/style.css')
    .scripts([
        'resources/js/jquery-1.11.3.min.js',
        'resources/js/bootstrap.min.js',
        'resources/js/owl.carousel.min.js',
        'resources/js/jquery.stickit.min.js',
        'resources/js/menu.js',
        'resources/js/scripts.js'
    ], 'public/js/script.js')
    .copy('resources/fonts', 'public/fonts')
    .copy('resources/images', 'public/images');
