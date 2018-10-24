module.exports = {
	dist: {
		files: {
			'<%= themedir %>/style.css': '<%= themedir %>/stylesheets/site.sass'
		}
	},
	editor: {
		files: {
			'<%= themedir %>/stylesheets/editor-style.css': '<%= themedir %>/stylesheets/editor-style.sass',
		}
	},
	gutenberg: {
		files: {
			'<%= themedir %>/stylesheets/editor-gutenburg.css': '<%= themedir %>/stylesheets/editor-gutenburg.sass',
		}
	},
	bootstrap: {
		files: {
			'node_modules/bootstrap/scss/bootstrap-custom.css': 'node_modules/bootstrap/scss/bootstrap-custom.scss'
		}
	}
};