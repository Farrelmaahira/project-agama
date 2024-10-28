/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            scrollBehavior: ['smooth'],
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            colors:{
                primary: "#2E073F",
                secondary: "#C8A1E0",
                tertiary: "#E2BFD9",
                font: "#F7EFE5",
                base: "#FFF"
            }
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["light", "dark"],
    },
};
