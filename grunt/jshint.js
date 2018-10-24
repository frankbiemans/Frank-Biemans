module.exports = {
    files: [
    '<%= themedir %>/scripts/functions.js',
    '<%= themedir %>/scripts/load.js'
    ],
    options: {
        expr: true,
        globals: {
            jQuery: true,
            console: true,
            module: true,
            document: true
        }
    }
};