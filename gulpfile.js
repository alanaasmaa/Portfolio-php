var elixir = require('laravel-elixir'),
    poststylus = require('poststylus'),
    rupture = require('rupture'),
    lost = require('lost'),
    axis = require('axis');

require('laravel-elixir-stylus');
require('laravel-elixir-imagemin');
//require('laravel-elixir-minify-html');

elixir.config.sourcemaps = true;

elixir(function(mix) {

	mix
    .stylus([
        'app.styl',
        'admin.styl'
        ], null, {
            use: [
                axis(),
                rupture(),
                poststylus(['lost'])
    ]})

    .version([
    	'css/app.css',
        'css/admin.css'
    ])
    /*.html(
        'storage/framework/views/*',
        'storage/framework/views/', 
        {
            collapseWhitespace: true, 
            removeAttributeQuotes: true, 
            removeComments: true, 
            minifyJS: true
        }
    )*/
    .scripts([
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
    });
});
