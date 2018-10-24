module.exports = {
	wordpress: {
		files: [{
			expand: true,
			cwd: 'downloads/wordpress/',
			src: ['*', '**/*'],
			dest: 'build/'
		}]
	},
	fontawesomefonts: {
		files: [{
			expand: true,
			cwd: 'C:\\Users\\frank\\Desktop\\Projecten\\Font-Awesome\\web-fonts-with-css\\webfonts\\',
			src: ['*', '**/*'],
			dest: '<%= themedir %>/webfonts/'
		}]
	}
};