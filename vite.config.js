import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import replacePlugin from '@rollup/plugin-replace'

const cdnReplaces = {
    'from \'../js/ckeditor.js\'': 'from \'https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js\'',
    preventAssignment: true,
    delimiters: ['', '']
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        }
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },

    build: {
        rollupOptions: {
            plugins: [
                replacePlugin(cdnReplaces)
            ]
        }
    }
});
