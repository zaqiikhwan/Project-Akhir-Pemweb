/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",],
  theme: {
    extend: {
      colors : {
        primary : {
          500 : "#019934"
        }
      },
      fontFamily : {
        jost : ['Plus Jakarta Sans', 'sans-serif'],
        poppins : ['Poppins', 'sans-serif']
      }
    },
  },
  plugins: [],
}

