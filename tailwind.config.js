/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      backgroundImage: {
        "image-bromo":
          "url(http://localhost:8080/rpl/assets/img/bromo_login.jpg)",
      },
    },
  },
  plugins: [require("flowbite/plugin")],
};
