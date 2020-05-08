module.exports = {
    purge: [],
    theme: {
        extend: {},
        fontFamily: {
            'sans': ['Nunito', 'Helvetica, Arial, sans-serif']
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms')
    ]
}
