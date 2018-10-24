module.exports = {
	downloads: {
		src: ['downloads']
	},
	wpplugins: {
		src: ['downloads/wordpress/wp-content/plugins/', 'downloads/wordpress/wp-content/themes/']
	},
	stylesdir: {
		src: ['<%= themedir %>/stylesheets/site.css', '<%= themedir %>/stylesheets/site.sass']
	}
};