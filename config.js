module.exports = {

	// Autoprefixer config
	COMPATIBILITY: [
		'last 2 versions',
		'ie >= 9',
		'ios >= 7'
	],

	// Your theme textdomain
	TEXTDOMAIN: 'domestic',
	PATHS: {

		// Transpiled files directory
		dist: 'dist',

		// Include these folders for Sass @import
		sassIncludes: [],

		// Webpack entry points
		// The object key is path and name in dist folder
		// The object value is path and name in source folder
		entries: {
			'assets/js/app': './src/assets/js/app.js',
			'assets/js/customize': './src/assets/js/customize.js',
			'assets/js/gutenberg': './src/assets/js/gutenberg.js',
			'assets/js/owl.carousel': './src/assets/owl-carousel/owl.carousel.js',
			'assets/css/style': './src/assets/scss/app.scss',
			'assets/css/editor-styles': './src/assets/scss/editor-styles.scss',
			'assets/css/owl.carousel': './src/assets/scss/owl.carousel.scss'
		},

		// Where to place images inside dist folder
		images: {

			// path relative to dist folder
			outputPath: 'assets/css/',

			// path relative to outputPath
			relativePath: 'images'
		},

		// Exclude/Include these files from package when running npm run package
		package: [
			'**/*',
			'!**/node_modules/**',
			'!**/package/**',
			'!**/codesniffer.ruleset.xml',
			'!**/composer.json',
			'!**/composer.lock',
			'!**/config.yml',
			'!**/config.default.yml',
			'!**/gulpfile.babel.js',
			'!**/package.json',
			'!**/package-lock.json',
			'!**/webpack.config.js',
			'!webpack-config/**',
			'!gulpfile.js',
			'!config.js',
			'!.editorconfig',
			'!.gitignore',
			'!README.md',
			'!CHANGELOG.md',
			'!tools',
			'!phpcs.ruleset.xml',
			'!**/vendor/**'
		]
	}
};
