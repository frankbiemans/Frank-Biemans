module.exports = {

	'default': ['cssmin:bower_css_files', 'uglify:bower_js_files', 'php', 'browserSync', 'watch'],

	'proces-images': ['imagemin'],

	'update-wp': ['curl:wordpress', 'unzip', 'clean:wpplugins', 'copy:wordpress', 'clean:downloads'],

	'render-css': ['concat:dist', 'sass:dist', 'postcss:dist', 'clean:stylesdir'],
	'backend-css': ['sass:editor', 'sass:gutenberg'],
	'render-js': ['jsbeautifier', 'jshint', 'uglify:custom_js_files'],
	'render-all': ['concat', 'sass', 'postcss:dist', 'cssmin:bower_css_files', 'render-js']
}