module.exports = {
	options: {
		apiKey: "NLBKGywJUAGDEpleCGufErRkaBuumDcP",
		checkSigs: true,
		sigFile: 'debug/file_sigs.json',
		summarize: true,
		showProgress: true,
		stopOnImageError: false
	},
	compress: {
		src: ['**/*.{png,jpg,jpeg}', '*.{png,jpg,jpeg}'],
		cwd: 'build/images/',
		dest: 'build/images/dest/',
		expand: true
	}
};