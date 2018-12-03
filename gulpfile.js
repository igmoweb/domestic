const fs = require( 'fs' );
	gulp = require( 'gulp' ),
	wpPot = require( 'gulp-wp-pot' ),
	run = require( 'gulp-run-command' ).default,
	zip = require( 'gulp-zip' ),
	replace = require( 'gulp-replace' ),
	rename = require( 'gulp-rename' ),
	tagVersion = require( 'gulp-tag-version' ),
	git = require( 'gulp-git' ),
	bump = require('gulp-bump');

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


function stageDistAssets() {
	return gulp.src([ './dist' ])
		.pipe( git.add({args:'-f'}) );
}

function stageLangs() {
	return gulp.src([ './languages' ])
		.pipe( git.add({args:'-f'}) );
}

function commit() {
	return gulp.src(['./dist/*', './languages/*'])
		.pipe(git.commit('Test', {args:'--no-verify'}));
}

function tagRelease() {
	return gulp.src([ './package.json' ])
		.pipe( tagVersion() );
}

// Don't call this directly. Do it with npm run tag
gulp.task( 'tag', gulp.series( stageDistAssets, stageLangs, commit ) );

gulp.task( 'default', gulp.series( run( 'npm run build' ), 'wpPot', 'generate-readme', 'package' ) );
