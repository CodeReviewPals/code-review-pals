import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

const serverSSL = (process.env.VITE_HTTPS || true) == true;
export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],

    server: {
        hmr: {
            host: 'localhost',
        },
    },
    resolve: {
        alias: {
            '~': '/resources',
        },
    },
});
