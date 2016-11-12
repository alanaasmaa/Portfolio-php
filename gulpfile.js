var gulp = require('gulp'),
    elixir = require('laravel-elixir'),
    poststylus = require('poststylus'),
    rupture = require('rupture'),
    axis = require('axis'),
    htmlmin = require('gulp-htmlmin'),
    cssnano = require('gulp-cssnano');

require('laravel-elixir-stylus');
require('laravel-elixir-imagemin');

elixir.config.sourcemaps = true;

elixir.extend('compress', function() {
    new elixir.Task('compress', function() {
        return gulp.src('./storage/framework/views/*')
            .pipe(htmlmin({
                collapseWhitespace:    true,
                removeAttributeQuotes: true,
                removeComments:        true,
                minifyJS:              true,
            }))
            .pipe(gulp.dest('./storage/framework/views/'));
    })
    .watch('./resources/views/**/*.blade.php');
});

elixir.extend('cssnano', function() {
    new elixir.Task('cssnano', function() {
        return gulp.src('./public/css/*.css')
            .pipe(cssnano({
                safe:true,
                autoprefixer: {add:true}
            }))
            .pipe(gulp.dest('./public/css/'));
    })
    .watch('./public/css/*.css');
});

elixir(function(mix) {

	mix
    .stylus('app.styl', null, {
            compress: true,
            use: [
                axis(),
                rupture(),
                poststylus(['lost'])
    ]})
    .stylus('admin.styl', null, {
            compress: true,
            use: [
                axis(),
                rupture(),
                poststylus(['lost']),
                autoprefixer()
    ]})
    .version([
    	'css/app.css',
        'css/admin.css'
    ])
    .webpack([
        'components/**/*.js',
        'app.js'
    ])
    .imagemin({
        optimizationLevel: 3,
        progressive: true,
        interlaced: true
    })
    .browserSync({
        proxy: 'cv.dev',
        notify: false
    })
    .cssnano()
    .compress();
});
