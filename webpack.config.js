const path = require('path');

module.exports = {
	mode: 'development',
	entry: './app/js/main.js',
	output: {
		path: path.resolve(__dirname, 'app/js'),
		filename: 'main.min.js'
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					'style-loader',
					'css-loader'
				]
			}
		]
	}

};

