module.exports = {
    bsFiles: {
        src: [
        '<%= themedir %>/style.css',
        '<%= themedir %>/stylesheets/*.css',
        '<%= themedir %>/**/*.min.js',
        '<%= themedir %>/**/backend.js',
        '<%= themedir %>/*.php',
        '<%= themedir %>/**/*.php',
        '<%= themedir %>/**/poll.css'
        ]
    },
    options: {
        proxy: 'localhost:<%= port %>',
        port: '<%= port %>',
        open: true,
        watchTask: true
    }
};