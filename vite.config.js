import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import vueJsx from '@vitejs/plugin-vue-jsx';
import path from 'path';
import { fileURLToPath } from 'url';
import svgLoader from 'vite-svg-loader';
import { imagetools } from 'vite-imagetools';
// import svgIconsPluginModule from 'vite-plugin-svg-icons'; // 👈 импорт как default
// const createSvgIconsPlugin = svgIconsPluginModule.createSvgIconsPlugin;

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default defineConfig({
  plugins: [
    vue(),
    vueJsx(),
    imagetools(),
    svgLoader(),
    // createSvgIconsPlugin({
    //   iconDirs: [path.resolve(__dirname, 'src/assets/icons')],
    //   symbolId: 'icon-[name]',
    // }),
  ],
  base: './',
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
    },
  },

  css: {
    preprocessorOptions: {
      scss: {
        additionalData: ``,
        // 👇 важно
        includePaths: [path.resolve(__dirname, './src')],
      },
    },
  },
});
