/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    './views/**/*.{html,php}',
    './components/**/*.php',
    './resources/ts/**/*.ts',
  ],
  theme: {
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
    },
  },
  plugins: [require('@tailwindcss/typography')],
}
