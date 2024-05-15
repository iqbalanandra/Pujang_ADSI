module.exports = {
  content: ['./html/login.html'],
  theme: {
    extend: {
      fontFamily: {
        'algerian': ['Algerian','sans-serif'],
         'poppins': ['Poppins','sans-serif'],
         'roboto': ['roboto','sans-serif'],
         'reddit-sans': ['reddit-sans','sans-serif'],
         'Montserrat': ['Montserrat','sans-serif'],
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            'a': {
              '&:hover': {
                borderBottomWidth: '1px',
              },
            },
          },
        },
      }),
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
};
