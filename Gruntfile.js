module.exports = function(grunt) {
    require('load-grunt-config')(grunt, {
        data: {
            themedirname: 'frankbiemans',
            themesdir: 'build/wp-content/themes/',
            themedir: '<%= themesdir %><%= themedirname %>',
            port: 6578,
        }
    });
};
