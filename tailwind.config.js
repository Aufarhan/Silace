import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily : {
                'lexend' : ["Lexend", 'sans-serif'],
                
            },
            colors: {
                primary : "#698AFF",
                secondary : "#2E2E2E",
                backgroundLight : "#F0F0F0",
                backgroundDark : "#0f172a",
                layerLight : "#f1f5f9",
                layerDark : "#1B283B",
                shade : "#F0F0F0",
            },
        },
    },

    plugins: [forms,
        require('flowbite/plugin'),
    ],
};
