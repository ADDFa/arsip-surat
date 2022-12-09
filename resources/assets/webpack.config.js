const path = require('path');

module.exports = {
    entry: './js/main.js',
    mode: 'production',
    output: {
        path: path.resolve(__dirname, '../../public/js'),
        filename: 'index.js'
    },
    watch: true
}