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
          500 : "#EF7D00"
        }
      },
      fontFamily : {
        jost : ['Jost', 'sans-serif']
      }

    },
  },
  plugins: [],
}

