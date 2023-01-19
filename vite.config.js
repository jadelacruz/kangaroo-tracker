import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/kangaroo/list.js',
                'resources/js/kangaroo/form.js'
            ],
            refresh: true,
        }),
    ],
});
