module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
    'denim-blue': '#0941ceff',
    'raisin-black': '#231b1bff',
    'kelly-green': '#63c132ff',
    'alice-blue': '#edf5fcff',
    }),
    ringColor: {
      'denim-blue': '#0941ceff',
      'kelly-green': '#63c132ff',
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
