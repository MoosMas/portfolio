import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
				'resources/css/fullview.css',
				'resources/js/fullview.js',
				'node_modules/fullview/dist/fullview.css',
				'node_modules/fullview/dist/fullview.js'
			],
            refresh: true,
        }),
    ],
});
