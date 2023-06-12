/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./app/Filament/**/*.php",
        "./app/View/**/*.php",
        "./app/Http/Livewire/**/*.php",
        "./resources/**/*.blade.php",
        "./vendor/**/*.blade.php",
        "./vendor/awcodes/filament-tiptap-editor/resources/views/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.emerald,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                sans: ["DM Sans", ...defaultTheme.fontFamily.sans],
            },
            gridTemplateRows: {
                7: "repeat(7, minmax(0, 1fr))",
                8: "repeat(8, minmax(0, 1fr))",
            },
            borderRadius: {
                "4xl": "2rem",
                "5xl": "2.5rem",
                "6xl": "5rem",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
