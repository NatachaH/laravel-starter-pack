import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/backend.scss',
                'resources/scss/auth.scss',
                'resources/scss/error.scss',
                'resources/js/app.js',
                'resources/js/backend.js'
            ],
            refresh: true,
        }),
    ],
});
