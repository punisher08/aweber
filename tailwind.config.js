/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{php,html,js}",
    "./views/*.{php,html,js}",
    "./views/layout/*.{php,html,js}",
    "./views/auth/*.{php,html,js}",
    "./views/admin/*.{php,html,js}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

