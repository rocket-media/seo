const path = require('path');

module.exports = {
	filenameHashing: false,
	outputDir: '../src/web/assets/field-settings',
	devServer: {
		https: true,
		headers: { "Access-Control-Allow-Origin": "*" },
		disableHostCheck: true,
	},
	chainWebpack: config => {
		// Force eslint to use this directories package.json as the config file
		// (Required when importing from above this dir (i.e. from `common`))
		config.module
			.rule('eslint')
			.use('eslint-loader')
			.tap(options => {
				options.configFile = path.resolve(__dirname, 'package.json');
				return options;
			})
	},
};
