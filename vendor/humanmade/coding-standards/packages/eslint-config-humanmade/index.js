module.exports = {
	'root': true,
	'env': {
		'browser': true,
		'es6': true,
	},
	'extends': [
		'eslint:recommended',
		'react-app',
	],
	'parserOptions': {
		'ecmaFeatures': {
			'experimentalObjectRestSpread': true,
			'jsx': true,
		},
		'sourceType': 'module',
	},
	'rules': {
		'array-bracket-spacing': [ 'error', 'always' ],
		'arrow-parens': [ 'error', 'as-needed' ],
		'arrow-spacing': [ 'error', {
			'before': true,
			'after': true,
		} ],
		'block-spacing': [ 'error' ],
		'brace-style': [ 'error', '1tbs' ],
		'comma-dangle': [ 'error', 'always-multiline' ],
		'comma-spacing': [ 'error', {
			'before': false,
			'after': true,
		} ],
		'eol-last': [ 'error', 'unix' ],
		'eqeqeq': [ 'error' ],
		'func-call-spacing': [ 'error' ],
		'indent': [ 'error', 'tab', {
			'SwitchCase': 1,
		} ],
		'key-spacing': [ 'error', {
			'beforeColon': false,
			'afterColon': true,
		} ],
		'keyword-spacing': [ 'error', {
			'after': true,
			'before': true,
		} ],
		'linebreak-style': [ 'error', 'unix' ],
		'no-console': [ 'warn' ],
		'no-mixed-spaces-and-tabs': [ 'error', 'smart-tabs' ],
		'no-multiple-empty-lines': [ 'error', {
			'max': 1,
		} ],
		'no-trailing-spaces': [ 'error' ],
		'no-var': [ 'warn' ],
		'object-curly-newline': [ 'error', {
			'minProperties': 2,
			'consistent': true,
		} ],
		'object-curly-spacing': [ 'error', 'always' ],
		'quotes': [ 'error', 'single' ],
		'semi-spacing': [ 'error', {
			'before': false,
			'after': true,
		} ],
		'space-before-function-paren': [ 'error', {
			'anonymous': 'always',
			'asyncArrow': 'always',
			'named': 'never',
		} ],
		'space-in-parens': [ 'warn', 'always', {
			'exceptions': [ 'empty' ],
		} ],
		'space-unary-ops': [ 'error', {
			'words': true,
			'nonwords': false,
			'overrides': {
				'!': true,
			},
		} ],
		'yoda': [ 'error', 'never' ],
		'react/jsx-curly-spacing': [ 'error', 'always' ],
	},
};
