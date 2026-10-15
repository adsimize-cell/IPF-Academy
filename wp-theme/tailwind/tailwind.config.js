/** Tailwind v3 config replicating the former CDN inline config (header.php) */
module.exports = {
  content: [
    './wp-theme/ipf-academy/**/*.php',
    './*.html',
  ],
  theme: {
    extend: {
      fontFamily: {
        serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
        sans: ['"Montserrat"', 'system-ui', 'sans-serif'],
      },
    },
  },
};
