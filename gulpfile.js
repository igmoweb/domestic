const fs = require( 'fs' );
	gulp = require( 'gulp' ),
	wpPot = require( 'gulp-wp-pot' ),
	run = require( 'gulp-run-command' ).default,
	zip = require( 'gulp-zip' ),
	replace = require( 'gulp-replace' ),
	rename = require( 'gulp-rename' ),
	tagVersion = require( 'gulp-tag-version' ),
	git = require( 'gulp-git' ),
	del = require( 'del' ),
	path = require( 'path' ),
	bump = require( 'gulp-bump' );

const config = require( './config' );
const pkg = JSON.parse( fs.readFileSync( './package.json' ) );

const deps = {
	js: [],
	css: [],
};

config.extDeps.forEach( file => {
	const ext = path.extname( file );
	if ( '.js' === ext ) {
		return deps.js.push( file );
	} else if ( '.css' === ext ) {
		return deps.css.push( file );
	}
});


// Generate the pot file
gulp.task( 'wpPot', function() {
	return gulp.src([
		'./**/*.php',
		'!vendor/**/*',
		'!package/**/*',
	])
		.pipe( wpPot({
			domain: config.TEXTDOMAIN,
		}) )
		.pipe( gulp.dest( `./languages/${config.TEXTDOMAIN}.pot` ) );
});

// Create a .zip archive of the theme
gulp.task( 'package', function() {
	const title = pkg.name + '.zip';
	return gulp.src( config.PATHS.package )
		.pipe( zip( title ) )
		.pipe( gulp.dest( 'package' ) );
});

gulp.task( 'generate-readme', function() {
	return gulp.src( 'readme.tpl' )
		.pipe( replace( '<%%version%%>', pkg.version ) )
		.pipe( replace( '<%%testedUpTo%%>', pkg.theme.testedUpTo ) )
		.pipe( replace( '<%%contributors%%>', pkg.theme.contributors ) )
		.pipe( rename( 'readme.txt' ) )
		.pipe( gulp.dest( './' ) );
});

gulp.task( 'generate-style', function() {
	return gulp.src( 'style.css.tpl' )
		.pipe( replace( '<%%version%%>', pkg.version ) )
		.pipe( replace( '<%%testedUpTo%%>', pkg.theme.testedUpTo ) )
		.pipe( replace( '<%%contributors%%>', pkg.theme.contributors ) )
		.pipe( rename( 'style.css' ) )
		.pipe( gulp.dest( './' ) );
});

gulp.task( 'delete-style', function() {
	return del([
		'style.css',
	]);
});

gulp.task( 'delete:builds', function() {
	return del([
		'dist/assets/css/*.js',
		'dist/assets/css/*.js.map',
	]);
});

gulp.task( 'copyDeps:js', function() {
	if ( 0 === deps.js.length ) {
		return Promise.resolve( 'No JS dependencies' );
	}

  return gulp.src( deps.js )
    .pipe( gulp.dest( path.resolve( __dirname, 'src/assets/js' ) ) );
});

gulp.task( 'copyDeps:css', function() {
	if ( 0 === deps.css.length ) {
		return Promise.resolve( 'No CSS dependencies' );
	}

  return gulp.src( deps.css )
    .pipe( copy( path.resolve( __dirname, 'src/assets/css' ) ) );
});

gulp.task( 'copyDeps', gulp.parallel( 'copyDeps:js', 'copyDeps:css' ) );

gulp.task( 'default', gulp.series( run( 'npm run build' ), 'wpPot', 'generate-readme', 'delete-style', 'generate-style', 'delete:builds', 'package' ) );
