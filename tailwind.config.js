import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ], 
    darkMode: 'class',
    theme: { 
        screens: {
			sm: '576px',
			md: '768px',
			lg: '992px',
			xl: '1200px',
			xxl: '1400px',
		},
        extend: {
            colors: { 
                primary: {
					DEFAULT: '#003276',  
					hover: '#1357B4',  
				},
              }, 
			  maxWidth: {
				'8xl': '90rem',
				'9xl': '95rem',
				'2xl' : '32rem'
			  },
              fontSize: {
				'4xs': '0.625rem', // 10px
				'3xs': '0.6875rem', // 11px
				'2xs': '0.8125rem', // 13px
				xs: ['0.875rem', '1.25rem'], // 14px/20px
				sm: ['0.9375rem', '1.4375'], // 15px/23px
				base: [ '1rem', '1.4285em' ],
				lg: [ '1.0625rem', '1.275rem' ], // 17px/20.4px
				'xl': [ '1.25rem', '1.5rem' ], // 20px/24px
				'2xl': [ '1.625rem', '1.75rem' ], // 26px/28px
				'3xl': [ '2.0625rem', '2rem' ], // 33px/32px
				'5xl': ['2.75rem', '2.75rem'], // 44px/44px 
			},
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
