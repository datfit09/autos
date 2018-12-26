'use strict';

let theme       = 'autos',
    site_name   = 'autos',
    
    gulp        = require( 'gulp' ),
    babel       = require( 'gulp-babel' ),
    
    autoLoad    = require( 'gulp-load-plugins' )(),
    del         = require( 'del' ),
    
    wpPot       = require( 'gulp-wp-pot' ),
    
    browserSync = require( 'browser-sync' ),
    runSequence = require( 'run-sequence' ),
    
    sass        = require( 'gulp-sass' ),
    sourcemaps  = require( 'gulp-sourcemaps' ),
    globbing    = require( 'gulp-css-globbing' ),
    
    concat      = require( 'gulp-concat' ),
    uglify      = require( 'gulp-uglify' ),
    buffer      = require( 'vinyl-buffer' );


/*SASS: `compressed` `expanded` `compact` `nested`*/
gulp.task( 'sass', () =>
    gulp.src( 'source/sass/style.scss' )
        .pipe( globbing({
            extensions: ['.scss']
        }))
        .pipe( sourcemaps.init())
        .pipe( sass( { outputStyle: 'expanded' } ).on( 'error', sass.logError ) )
        .pipe( sourcemaps.write( '.' ) )
        .pipe( gulp.dest( theme ) )
);

/*SCRIPTS*/
function handleError ( e ) {
    console.log( e.toString() );
    this.emit( 'end' );
}

gulp.task( 'scripts', () =>
    gulp.src( './source/js/*.js' )
    .pipe( babel({
        presets: ['es2015']
    }))
    .on( 'error', handleError )
    .pipe( buffer() )
    /*.pipe( uglify() )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( sourcemaps.write( '.' ) )*/
    .pipe( gulp.dest( theme + '/assets/js/' ) )
);

/*BROSWER SYNC*/
gulp.task( 'browser-sync', () =>
    browserSync({
        files: [theme + '/*.css', 'style.css'],
        proxy: 'http://' + theme + '.io',
        notify: false,
    })
);

/*CREATE .POT FILE*/
gulp.task( 'pot', () => {
    gulp.src( theme + '/**/*.php' )
        .pipe( wpPot( {
            domain: theme,
            package: 'Haintheme'
        } ) )
        .on( 'error', handleError )
        .pipe( gulp.dest( theme + '/languages/' + theme + '.pot' ) );
} );

/*CLEAN*/
gulp.task( 'clean', del.bind( null, ['build'] ) );

/*WATCH*/
gulp.task( 'watch', ['browser-sync'], () => {
    gulp.watch( 'source/sass/**/*.scss', ['sass'] );
    gulp.watch( 'source/js/*.js', ['scripts'] );
    gulp.watch( theme + '/**/*.php', ['pot'] );
});

/*DEFAULT TASK*/
gulp.task( 'default', ['watch'] );