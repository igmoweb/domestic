const fs = require( 'fs' );
const gulp = require( 'gulp' );
const wpPot = require( 'gulp-wp-pot' );
const run = require( 'gulp-run-command' ).default;
const zip = require( 'gulp-zip' );

const config = require( './config' );
const pkg = JSON.parse( fs.readFileSync( './package.json' ) );

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

gulp.task( 'default', gulp.series( run( 'npm run build' ), 'wpPot', 'package' ) );
