module.exports = {
	dist: {
		src: [
		'<%= themedir %>/stylesheets/theme-init.css',
		'<%= themedir %>/stylesheets/base.sass',
		'<%= themedir %>/stylesheets/media-queries.sass'
		],
		dest: '<%= themedir %>/stylesheets/site.sass'
	},
	bootstrap: {
		src: [
		'bootstrap-vars.scss',
		'node_modules/bootstrap/scss/bootstrap.scss'
		],
		dest: 'node_modules/bootstrap/scss/bootstrap-custom.scss'
	}
};