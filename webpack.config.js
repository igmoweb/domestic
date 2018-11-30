const path = require( 'path' );
const merge = require( 'webpack-merge' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const WriteFilePlugin = require( 'write-file-webpack-plugin' );
const webpack = require( 'webpack' );
const CleanWebpackPlugin = require( 'clean-webpack-plugin' );

const config = require( './config.js' );
const parts = require( './webpack-config/webpack.parts' );

const cleanPlugin = new CleanWebpackPlugin([ path.resolve( __dirname, 'dist' ) ]);

const commonConfig = merge([
	{
		entry: config.PATHS.entries,
		output: {
			path: path.resolve( __dirname, config.PATHS.dist )
		}
	},
	{
		devtool: 'inline-source-map'
	},
	parts.loadJavaScript(),
	parts.manifest(),
	parts.rtl()
]);

const productionConfig = merge([
	{
		output: {
			filename: '[name].[hash].js'
		}
	},
	parts.loadSass({
		use: [
			'style-loader',
			MiniCssExtractPlugin.loader,
			'css-loader',
			parts.autoprefix(),
			{
				loader: 'sass-loader',
				options: {
					includePaths: config.PATHS.sassIncludes
				}
			}
		]
	}),
	parts.generateSourceMaps({ type: 'source-map' }),
	parts.minifyCSS(),
	{
		plugins: [ cleanPlugin ]
	}
]);

const developmentConfig = merge([
	{
		output: {
			filename: '[name].js',
			hotUpdateChunkFilename: 'hot/hot-update.js',
			hotUpdateMainFilename: 'hot/hot-update.json'
		}
	},
	{
		plugins: [
			new WriteFilePlugin(),
			new webpack.HotModuleReplacementPlugin(),
			cleanPlugin
		]
	},
	parts.devServer(),
	parts.loadSass({
		use: [
			'style-loader',
			MiniCssExtractPlugin.loader,
			'css-loader',
			{
				loader: 'sass-loader',
				options: {
					includePaths: config.PATHS.sassIncludes
				}
			}
		],
		filename: '[name].css'
	}),
	parts.generateSourceMaps({ type: 'eval' })
]);

module.exports = mode => {
	if ( 'production' === mode ) {
		return merge( commonConfig, productionConfig, { mode });
	}

	return merge( commonConfig, developmentConfig, { mode });
};
