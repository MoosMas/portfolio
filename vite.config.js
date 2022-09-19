import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
				'resources/css/app.css',
				'resources/css/fullview.css',
				'resources/js/app.js',
				'resources/js/fullview.js',
				'node_modules/fullview/dist/fullview.css',
				'node_modules/fullview/dist/fullview.js'
			],
            refresh: true,
        }),
    ],
});
