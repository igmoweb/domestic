const fs = require( 'fs' );
	gulp = require( 'gulp' ),
	wpPot = require( 'gulp-wp-pot' ),
	run = require( 'gulp-run-command' ).default,
	zip = require( 'gulp-zip' ),
	replace = require( 'gulp-replace' ),
	rename = require( 'gulp-rename' ),
	tagVersion = require( 'gulp-tag-version' ),
	git = require( 'gulp-git' ),
	del = require( 'del' );
	bump = require( 'gulp-bump' );

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

gulp.task( 'delete:builds', function() {
	return del([
		'dist/assets/css/*.js',
		'dist/assets/css/*.js.map',
	]);
});

gulp.task( 'default', gulp.series( run( 'npm run build' ), 'wpPot', 'generate-readme', 'generate-style', 'delete:builds', 'package' ) );
