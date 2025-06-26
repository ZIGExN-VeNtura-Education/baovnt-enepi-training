// vite.config.js
import { defineConfig } from 'vite';
import tailwindcss from "@tailwindcss/vite";
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    tailwindcss(),
    vue(),
  ],
  build: {
    outDir: 'public/build',
    manifest: true,
    rollupOptions: {
      input: {
        app: 'resources/js/app.js',
        css: 'resources/css/app.css',
      },
    },
    copyPublicDir: false,
  },
  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    origin: 'http://localhost:5173',
    watch: {
      usePolling: true,
    },
  },
});
