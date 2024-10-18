import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import commonjs from 'vite-plugin-commonjs'
export default defineConfig({
    plugins: [
        commonjs(),
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': 'bootstrap'
        }
    }
});
