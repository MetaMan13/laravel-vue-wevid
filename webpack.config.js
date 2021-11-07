const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            'Forms': path.resolve(__dirname, 'resources/js/Components/Shared/Forms'),
        },
    },
};
