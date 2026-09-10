import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    950: '#070D1E',
                    900: '#0B152F',
                    850: '#0F1E42',
                    800: '#142756',
                    700: '#1C3572',
                },
                nile: {
                    DEFAULT: '#0D9488',
                    light: '#14B8A6',
                    dark: '#0F766E',
                    cyan: '#06B6D4',
                },
                gold: {
                    DEFAULT: '#F59E0B',
                    light: '#FBBF24',
                    dark: '#D97706',
                    soft: '#FEF3C7',
                }
            }
        },
    },
    plugins: [],
};
