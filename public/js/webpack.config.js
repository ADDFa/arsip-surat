const path = require('path');

module.exports = {
    entry: './resources/main.js',
    mode: 'production',
    output: {
        path: path.resolve(__dirname, ''),
        filename: 'main.js'
    },
    watch: true
}