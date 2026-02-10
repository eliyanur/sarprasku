import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                mochiy: ['"Mochiy Pop One"', 'sans-serif'],
            },
            colors: {
               indigo: {
                500: '#6366F1',
                50: '#EEF2FF',
            },
                sky_blue: '#00A1F8',
                cream: '#F5ECD5',
            }
        },
    },

    plugins: [forms],
};
