import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import mkcert from 'vite-plugin-mkcert';

const serverSSL = (process.env.VITE_HTTPS || true) == true;
export default defineConfig({
    server: { https: serverSSL },
    plugins: [
        mkcert(),
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            '~': '/resources',
        },
    },
});
