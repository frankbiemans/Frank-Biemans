module.exports = {
    options: {
        map: false,
        processors: [
        require('autoprefixer')({
            browsers: 'last 2 versions'
        }),
        require('cssnano')({
            zindex: false,
            discardComments: false
        })
        ]
    },
    dist: {
        src: '<%= themedir %>/style.css',
        dest: '<%= themedir %>/style.css'
    }
};