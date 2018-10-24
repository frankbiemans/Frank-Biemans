module.exports = {
    theme: {
        auth: {
            host: 'ftp.nosuchdemos.nl',
            port: 21,
            authKey: 'nosuchdemos'
        },
        src: '<%= themedir %>',
        dest: '/<%= demositedir %>/wp-content/themes/<%= themedirname %>',
        exclusions: [
        '**/.DS_Store',
        '**/Thumbs.db',
        '**/.svn',
        '**/bower_components',
        '**/node_modules'
        ]
    }
};