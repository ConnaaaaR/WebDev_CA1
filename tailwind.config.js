const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },



            colors: {
                "open-sky": "#4EA5D9",
                "sea-blue": "#0471A6",
                "endless-oasis": "#0D1821",
                "rose": "#AC80A0",
                "frost": "#FBF9FF",             
            },


            screens: {
                
              },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};

