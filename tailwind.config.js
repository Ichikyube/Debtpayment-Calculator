const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                redHatMono: ['Red Hat Mono', 'monospace'],
                poppins: ['Poppins', 'sans-serif']
            },
            colors: {
                dark:'#354446',
                main:'#F7D3C2',
                myblue:'#18A0FB',
                myyellow:'#FDC32F',
                myorange:'#FBB85D'
            },
            dropShadow: {
                '3xl': '0 25px 25px rgba(251, 184, 93, 1)',
            }
        },
    },
    variants: {
        extend: {
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
}
