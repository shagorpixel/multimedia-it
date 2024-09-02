/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            primary: "#EDB922",
          },
          fontFamily: {
            body: ["Nunito"],
          },
          borderRadius: {
            big: "3rem",
          },
          spacing: {
            112: "28rem",
            128: "32rem",
          }
    }
  },
  plugins: [],
}

