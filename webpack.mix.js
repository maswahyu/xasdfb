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
            width: 380,
            height: 1200,
            minify: true,
            // penthouse: {
            //     forceInclude: ['.post-meta', '.post-meta__category', '.post-meta__category span', '.post-meta__stat'],
            // },
        }
    })
    .browserSync({
        proxy: 'http://lazone-site.test'
    });
