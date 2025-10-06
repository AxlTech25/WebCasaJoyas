import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/js/app.js'],
=======
            input: [ 'resources/js/app.js', 'resources/js/admin.js'],
>>>>>>> master
            refresh: true,
        }),
    ],
});
