/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

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
                transparent: 'transparent',
                current: 'currentColor',
                amber: colors.amber,
                black: colors.black,
                blue: colors.blue,
                cyan: colors.cyan,
                emerald: colors.emerald,
                fuchsia: colors.fuchsia,
                gray: colors.trueGray,
                blueGray: colors.blueGray,
                coolGray: colors.coolGray,
                trueGray: colors.trueGray,
                warmGray: colors.warmGray,
                green: colors.green,
                indigo: colors.indigo,
                lime: colors.lime,
                orange: colors.orange,
                pink: colors.pink,
                purple: colors.purple,
                red: colors.red,
                rose: colors.rose,
                sky: colors.sky,
                teal: colors.teal,
                violet: colors.violet,
                yellow: colors.amber,
                white: colors.white,
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
