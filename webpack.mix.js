const mix = require('laravel-mix');
mix.pug = require('laravel-mix-pug');

const htmlPath = 'public/html/';
const srcPath = 'resources/src/';

mix.setPublicPath('public/assets/');
mix.disableNotifications();

mix.sass(srcPath + 'scss/site.scss', 'css/')
  .sass(srcPath + 'scss/docs.scss', 'css/')
  .options({
    processCssUrls: false
  })
  .scripts([
    srcPath + 'js/plugins.js',
    srcPath + 'js/site.js'
  ], 'public/assets/js/site.js')
  .sourceMaps()
  .pug(srcPath + 'pug/*.pug', '../../../public/html', {
      pug: {
        pretty: true
      }
    })
  ;
