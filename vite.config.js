import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/assets/libs/bootstrap/css/bootstrap.min.css',
                'resources/assets/css/styles.css',
                'resources/assets/css/icons.css',
                'resources/assets/css/custom.css'
            ],
            refresh: true,
        }),
    ],
});
