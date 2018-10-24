module.exports = {
    options: {
        plugins: [
        {
            removeViewBox: false
        }, {
            removeUselessStrokeAndFill: false
        }
        ]
    },
    dist: {
        files: {
            '<%= themedir %>/images/nsc_logo.min.svg': '<%= themedir %>/images/nsc_logo.svg'
        }
    }
};