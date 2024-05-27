import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}",
    ],

    // theme: {
    //     extend: {
    //         fontFamily: {
    //             sans: ['Figtree', ...defaultTheme.fontFamily.sans],
    //         },
    //     },
    // },

    darkMode: "class",
    theme: {
        extend: {
            colors: {
                // primary: {
                //     DEFAULT: "#293B5F", // For background
                //     light: "#3C5E9E", // For text
                // },
                // secondary: {
                //     DEFAULT: "#3C5E9E", // For background
                //     light: "#A6B9E2", // For text
                // },
                primary: {
                    DEFAULT: "#D85829", // For background
                    light: "#FD9577", // For text
                },
                secondary: {
                    DEFAULT: "#3C5E9E", // For background
                    light: "#A6B9E2", // For text
                },
                light: "#F2F6FF",
                "light-gray": "#EAEDF4",
            },
        },
        fontFamily: {
            body: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
            sans: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
        },
    },
    plugins: [forms, "prettier-plugin-tailwindcss", require("flowbite/plugin")],
};
