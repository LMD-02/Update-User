const mix = require('laravel-mix');
let path = require('path');

let directory_asset = 'public/vendor/asset';
mix.setPublicPath(path.normalize(directory_asset));


let build_scss = [
    {
        from: 'Modules/User/Asset/scss/index.scss',
        to: 'css/user.css',
    },
];

let build_js = [
    {
        from: 'Modules/User/Asset/js/index.js',
        to: 'js/user.js'
    },
];


build_js.map((file) => {
    mix.js(file.from, file.to);
});

build_scss.map((file) => {
    mix.sass(file.from, file.to).minify(directory_asset + '/' + file.to);
});

mix.options({
    processCssUrls: false
})
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

if (mix.inProduction()) {
    mix.version();
}

