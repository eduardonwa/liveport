const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'regal-blue': '#243c5a',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['active'],
        },
        fill: ['hover', 'focus'],
    },

    plugins: [require('@tailwindcss/forms')],
};
