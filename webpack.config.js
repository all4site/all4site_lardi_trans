const path = require('path');

module.exports = {
	mode: 'development',
	entry: './app/js/data.js',
	output: {
		path: path.resolve(__dirname, 'app/js'),
		filename: 'data.min.js'
	},

};

