module.exports = {
	BROWSERSYNC: {

		// URL of local development server goes here (ex. http://localsite.dev)
		url: ''
	},

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
			'js/theme': './src/js/theme.js',
			'css/style': './src/scss/style.scss',
			'css/editor-styles': './src/scss/editor-styles.scss'
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
			'!.gitignore',
			'!README.md',
			'!CHANGELOG.md',
			'!tools',
			'!phpcs.ruleset.xml',
			'!**/vendor/**'
		]
	}
};
