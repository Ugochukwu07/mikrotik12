const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            trueGray: colors.trueGray,
            blueGray: colors.blueGray,
            coolGray: colors.coolGray,
            gray: colors.gray,
            orange: colors.orange,
            amber: colors.amber,
            red: colors.red,
            blue: colors.blue,
            yellow: colors.amber,
            lime: colors.lime,
            lightBlue: colors.lightBlue,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            violet: colors.violet,
            pink: colors.pink,
            rose: colors.rose,
            white: colors.white,
            indigo: colors.indigo,
            green: colors.green,
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
