module.exports = {
    images: {
        options: {
            optimizationLevel: 1,
            progressive: true
        },
        files: [{
            expand: true,
            cwd: 'images/',
            dest: 'images-comp/',
            src: ['*.{jpeg,png,jpg,gif}']
        }]
    }
};