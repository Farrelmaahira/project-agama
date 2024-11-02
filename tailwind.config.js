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
                tertiary: "#F1DFE8",
                font: "#F7EFE5",
                bgimage: "#F7F6F1",
                base: "#FEFCFA"
            }
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["light", "dark"],
    },
};
