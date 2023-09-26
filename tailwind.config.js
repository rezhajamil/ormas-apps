const defaultTheme = require("tailwindcss/defaultTheme");

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
                premier: "#952323",
                sekunder: "#A73121",
                tersier: "#DAD4B5",
                kuartener: "#F2E8C6",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
