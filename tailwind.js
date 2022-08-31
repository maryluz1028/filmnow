module.exports = {
    mode: 'jit',
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
    purge: {
        content: [
            './*.php',
            './templates/**/*.php',
            './build/js/**/*.js',
        ],
        options: {
            safelist: [],
            blocklist: [],
            keyframes: true,
            fontFace: true,
        },
    },
    theme: {
            screens:{
            'sm':	'640px',
            'md':	'768px'	,
            'lg':	'1024px',
            'xl':	'1200px',	
            '2xl':	'1400px',	
        },
        container: {
            center: true,
            padding: '1rem'
        },
        fontFamily:{
            Dosis:'Dosis',
            Nunito:'Nunito',
        },
        extend: {
            colors: {
                'color-black':"#121212",
                'color-alpha-black':"rgba(18,18,18,.5)",
                'color-alpha-black02':"rgba(18,18,18,.75)",
                'color-black2':"#363636",
                'color-red':"#dd003f",
                'color-red2':"#eb0056",
                'color-white':"#f9f9f9",
                'color-aplha-white':"rgba(249,249,249,.2)",
                'color-gray':"#f9f9f9",
                'color-gray2':"#f9f9f9",
                'color-gray03':"#525252"
            },
            fontSize: {
                xxs: '0.675rem',
            },
            lineHeight: {
                tighter: '1.125',
            },
        }
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'visited'],
    },
    plugins: [
        ({addUtilities}) => {
            const utils = {
                '.translate-x-half': {
                    transform: 'translateX(50%)',
                },
            };
            addUtilities(utils, ['responsive'])
        }
    ]
};
