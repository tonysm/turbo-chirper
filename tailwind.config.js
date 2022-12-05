const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
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

            animation: {
                'appear-then-fade-out': 'appear-then-fade-out 3s both',
            },

            keyframes: () => ({
                ['appear-then-fade-out']: {
                    '0%, 100%': { opacity: 0 },
                    '10%, 80%': { opacity: 1 },
                },
            }),
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
