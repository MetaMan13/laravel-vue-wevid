const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '@Layouts': path.resolve(__dirname, 'resources/js/Layouts/'),
            'Icons': path.resolve(__dirname, 'resources/js/Components/Icons'),
            'Forms': path.resolve(__dirname, 'resources/js/Components/Shared/Forms'),
            'Shared': path.resolve(__dirname, 'resources/js/Components/Shared'),
        },
    },
};
