import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import inject from '@rollup/plugin-inject';
//import commonjs from '@rollup/plugin-commonjs';

export default defineConfig({
    plugins: [
        //commonjs(),
        inject({ $: 'jquery', jQuery: 'jquery'}),
        vue(),
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        })
    ],
});





