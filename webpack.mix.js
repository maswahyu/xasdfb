let mix = require('laravel-mix');

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
    .browserSync({
        proxy: 'http://lazone-site.test'
    });
