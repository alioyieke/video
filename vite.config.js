import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig({
    // plugins: [
    //     laravel({
    //         input: ['resources/css/app.css', 'resources/js/app.js'],
    //         refresh: true,
    //     }),
    //     tailwindcss(),
    // ],
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: { // For Bootstrap alias
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    }
});
