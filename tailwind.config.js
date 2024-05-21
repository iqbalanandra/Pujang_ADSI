/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js}'],
  theme: {
    extend: {
      backgroundImage: theme => ({
        'quote-bg': "url(image/paper_texture.png')"
      }),
      fontFamily: {
        poppins: ['Poppins'],
        caveat: ['Caveat']
      }
    },
  },
  plugins: [],
}

