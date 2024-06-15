/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.{html,js,php}'],
  theme: {
    extend: {

      dropShadow: {
        '3xl': '0 35px 35px rgba(0, 0, 0, 0.25)',
        '4xl': [
            '0 35px 35px rgba(0, 0, 0, 0.25)',
            '0 45px 65px rgba(0, 0, 0, 0.15)'
        ],
        'pekat': '3px 9px 7px rgba(0, 0, 0, 1)'
      },

      colors: {
        'body' : '#E3E1E1',
        'merah' : '#E6382D',
        'aksen' : '#2C323D'
      },
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

