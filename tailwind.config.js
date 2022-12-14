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
            spacing: {
                70: "17.5rem",
                175: "43.75rem",
                22: "5.5rem",
                104: "26rem",
                76: "19rem",
            },
            maxWidth: {
                custom: "68.5rem",
            },

            colors: {
                "gray-background": "#f6f8fb",
                blue: "#328af1",
                "blue-hover": "#2879bd",
                yellow: "#ffc73c",
                red: "#c454ef",
                green: "#1aab8b",
                violet: "#8b60ed",
            },
            fontSize: {
                xxs: "0.625rem",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/line-clamp"),
    ],
};
