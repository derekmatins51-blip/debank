const mix = require("laravel-mix");

const path = require('path');

mix.options({
    processCssUrls: false
});

mix.webpackConfig({
    resolve: {
        fallback: {
            "crypto": require.resolve("crypto-browserify"),
            "stream": require.resolve("stream-browserify"),
            "fs": false,  // Disable fs as it's server-only
            "path": require.resolve("path-browserify"),
            "http": require.resolve("stream-http"),
            "https": require.resolve("https-browserify"),
            "zlib": require.resolve("browserify-zlib"),
            "net": false,
            "tls": false,
            "constants": require.resolve("constants-browserify"),
            "assert": require.resolve("assert"),
            "buffer": require.resolve("buffer"),
            "url": require.resolve("url"),
            "util": require.resolve("util")
        },
        alias: {
            '@': path.resolve('resources/js'),
        }
    },
    externals: {
        // Exclude server-only SDKs from frontend bundle
        'metaapi.cloud-sdk': 'MetaApiCloudSdk'
    }
});

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

mix.js("resources/js/app.js", "public/js")
   .css('resources/css/app.css', 'public/css')
   .version();

if (mix.inProduction()) {
    mix.version();
}
