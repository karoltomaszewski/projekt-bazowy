/** @type {import('tailwindcss').Config} */
module.exports = {
    important: true,
  content: [
      "./**/*.{js,ts,jsx,tsx,vue,css}"
  ],
    theme: {
        extend: {
            colors: {
                purple: {
                    DEFAULT: '#8A2BE2',
                    dark: '#7119c1'
                }
            },
            backgroundColor: theme => ({
                'purple': theme('colors.purple'),
            }),
        },
    },
  plugins: [],
}

