/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            scrollBehavior: ['smooth']
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["light", "dark"],
    },
};
