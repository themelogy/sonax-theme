var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var del = require('del');
var themeInfo = require('./theme.json');

process.env.DISABLE_NOTIFIER = true;

elixir.config.publicPath = 'assets';

var publicPath = '../../public';
var themePath = publicPath + '/themes/sonax';
var cssPath = themePath + '/css';
var jsPath =  themePath + '/js';

var Task = elixir.Task;

elixir.extend('del', function(path) {
   new Task('del', function() {
     return del(path, {force:true});
   });
});

elixir.extend('stylistPublish', function() {
    new Task('stylistPublish', function() {
        return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    });
});

// elixir(function (mix) {

    // mix.sass('bootstrap.scss', cssPath + '/bootstrap.css')
        // .sass('semantic-ui/semantic-ui.scss', cssPath + '/plugins/semantic-ui/semantic.css')
        // .sass('plugins.scss', cssPath + '/base/plugins.css')
        // .sass('components.scss', cssPath + '/base/components.css')
        // .sass('themes/red4.scss', cssPath + '/base/themes/red4.css')
        // .sass('custom.scss', cssPath + '/base/custom.css');

    // mix.version([
        // 'css/bootstrap.css',
        // 'css/plugins/semantic-ui/semantic.css',
        // 'css/base/plugins.css',
        // 'css/base/components.css',
        // 'css/base/themes/red4.css',
        // 'css/base/custom.css',
        // 'css/base/all.css'
    // ], themePath);

// });

elixir(function (mix) {

    mix.del(['assets/css', 'assets/js']);
    mix.del(themePath+'/**');

    mix.sass('bootstrap.scss', 'resources/assets/css/bootstrap.css')
        .sass('plugins.scss', 'resources/assets/css/base/plugins.css')
        .sass('components.scss', 'resources/assets/css/base/components.css')
        .sass('themes/red4.scss', 'resources/assets/css/base/themes/red4.css')
        .sass('custom.scss', 'resources/assets/css/base/custom.css')
        .sass('semantic-ui/semantic-ui.scss', 'resources/assets/css/plugins/semantic-ui/semantic-ui.css');

    mix.copy('resources/assets/vendor/jquery/dist/jquery.min.js', 'resources/assets/js')
        .copy('resources/assets/vendor/semantic-ui-sass/app/assets/javascripts/semantic-ui.js', 'resources/assets/js/plugins/semantic-ui')
        .copy('resources/assets/css/bootstrap.css', 'assets/css/bootstrap.css')
        .copy('resources/assets/css/base/plugins.css', 'assets/css/base')
        .copy('resources/assets/css/base/components.css', 'assets/css/base')
        .copy('resources/assets/css/base/themes/default.css', 'assets/css/base/themes')
        .copy('resources/assets/css/base/custom.css', 'assets/css/base')
        .copy('resources/assets/css', 'assets/css')
        .copy('resources/assets/js', 'assets/js')
        .copy('resources/assets/img', 'assets/img');

    mix.styles([
        'bootstrap.css',
        'plugins/semantic-ui/semantic-ui.css',
        'base/plugins.css',
        'base/components.css',
        'base/themes/default.css',
        'base/custom.css'
    ], 'assets/css/base/all.css');

    mix.scripts([
        'jquery.min.js'
    ]);

    mix.version([
        'css/bootstrap.css',
        'css/plugins/semantic-ui/semantic-ui.css',
        'css/base/plugins.css',
        'css/base/components.css',
        'css/base/themes/red4.css',
        'css/base/custom.css',
        'css/base/all.css',
        'js/jquery.min.js'
    ], 'assets');

    mix.stylistPublish();

});