let mix = require('laravel-mix');

require('laravel-mix-criticalcss');

mix
    .sass('resources/frontend/sass/main.scss', 'public/static/css/main.css')
    .options({
        processCssUrls: false,
        postCss: [
            require('postcss-normalize')({
                forceImport: true
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
    })
    .criticalCss({
        enabled: mix.inProduction(),
        paths: {
            base: 'http://lazone.local/',
            templates: './public/static/css/',
            suffix: '_critical.min'
        },
        urls: [
            { url: '/', template: 'index' },
        ],
        options: {
            minify: true,
        }
    })
    .browserSync({
        proxy: 'http://lazone-site.test'
    });
