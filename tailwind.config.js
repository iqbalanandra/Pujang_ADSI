/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js,php}'],
  theme: {
    extend: {
      backgroundImage: theme => ({
        'quote-bg': "url(image/paper_texture.png')"
      }),
      fontFamily: {
        poppins: ['Poppins'],
        caveat: ['Caveat'],
        neuton: ['Neuton'],
        sanchez: ['Sanchez'],
        robotoSlab: ['Roboto Slab'],
        roboto: ['Roboto']
      }
    },
  },
  plugins: [],
}

