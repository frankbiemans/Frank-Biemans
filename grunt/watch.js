module.exports = {
	sass: {
		files: ['<%= themedir %>/stylesheets/base.sass', '<%= themedir %>/stylesheets/media-queries.sass', '<%= themedir %>/stylesheets/assets/*.sass', '<%= themedir %>/stylesheets/theme-init.css'],
		tasks: ['render-css']
	},
	js: {
		files: ['<%= themedir %>/scripts/load.js', '<%= themedir %>/scripts/functions.js'],
		tasks: ['render-js']
	},
	backend: {
		files: ['<%= themedir %>/stylesheets/editor-style.sass', '<%= themedir %>/stylesheets/editor-gutenburg.sass'],
		tasks: ['backend-css']
	}
};