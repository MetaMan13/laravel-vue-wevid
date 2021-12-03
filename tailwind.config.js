const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '24': '6rem',
                '56': '14rem',
                '60': '15rem'
            },

            margin: {
                '18': '4.5rem',
                '22': '5.5rem',
            },
            padding: {
                '17': '4.25rem',
                '18': '4.5rem',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backdropBlur: ['hover', 'focus'],
            backdropFilter: ['hover', 'focus'],
            display: ['group-hover'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
};
