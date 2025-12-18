/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#2563eb",      // bleu royal – confiance
        secondary: "#16a34a",    // vert calme – validation OK
        accent: "#f59e0b",       // jaune énergie – CTA
        danger: "#dc2626",       // rouge sérieux – erreurs
        dark: "#0f172a",         // fond sombre élégant
        light: "#f8fafc",        // fond clair
      },
    },
  },
  plugins: [],
}
