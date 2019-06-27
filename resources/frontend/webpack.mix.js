let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('src/app.js', 'dist/').sass('src/app.scss', 'dist/');

mix
    .sass('sass/frontend/main.scss', 'css/main.css')
    .options({
        processCssUrls: false,
        postCss: [
            require('postcss-normalize')({
                forceImport: true
            }),
            require('postcss-css-variables')({
                preserve: true
            }),
            require('postcss-preset-env')(),
            require('postcss-object-fit-images')(),
            require('postcss-flexibility')(),
            require('cssnano')({
                preset: ['default', {
                    discardComments: {
                        removeAll: true,
                    },
                    normalizeWhitespace: false,
                }]
            })
        ]
    });
