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
            fontFamily : {
                "poppins" : ['poppins']
              },
              colors : {
                "biru-tua" : '#202A44',
                "biru_hover": '#171E31',
                "merah" : '#CF2E2E',
                "beige" : '#FFF4F0',
                "kuning": '#F9CB54',
                "biru": '#4F82E5',
                "abuabu": '#F4F4F4',
            }
        },
    },

    plugins: [forms],
};
