/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./build/**/*.{html,js,php}"],
  theme: {
      extend: {
        colors:{
          'unique-black':'#0D0D0D',
          'font-color':'#F2F2F2',
          'font-color-hover':'#D7D7D9',
          'project-bg':'#A61420',
          'project-bg-2':'#1DA1F2',
          },
    
          fontFamily: {
            sans: ['Graphik', 'sans-serif'],
            serif: ['Merriweather', 'serif'],
          }
      },
  
   },
    extend: {
    },
  
  plugins: [],
}

