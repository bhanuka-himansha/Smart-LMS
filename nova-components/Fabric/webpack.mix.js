let mix = require('laravel-mix')

require('./nova.mix')

mix
  .disableNotifications()
  .setPublicPath('dist')
  .js('resources/js/field.js', 'js')
  .vue({ version: 3 })
  .css('resources/css/field.css', 'css')
  .nova('customf/fabric')
  mix.webpackConfig({
    resolve: {
        fallback: {
            buffer: require.resolve('buffer/'),
        },
    },
});
