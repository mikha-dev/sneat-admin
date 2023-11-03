const mix = require('laravel-mix');
require('dotenv').config();
const glob = require('glob');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

let distPath = mix.inProduction() ? 'resources/dist' : 'resources/pre-dist';

function mixAssetsDir(query, cb) {
    (glob.sync('resources/assets/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/');
        cb(f, f.replace('resources/assets', distPath));
    });
}

function dcatPath(path) {
    return 'resources/assets/dcat/' + path;
}

function dcatDistPath(path) {
    return distPath + '/dcat/' + path;
}


function themeCss(path) {
  return `${distPath}/css/${path}.css`;
}

function themeJs(path) {
  return `${distPath}/js/${path}.js`;
}

/*
 |--------------------------------------------------------------------------
 | Dcat Admin assets
 |--------------------------------------------------------------------------
 */

mix.copyDirectory('resources/assets/svg', distPath + '/svg')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', distPath + '/fonts/fontawesome');

// Theme
mix.sass('resources/assets/sass/theme.scss', themeCss('theme'))
    .options({
        processCssUrls: false
    })
    .sourceMaps();
mix.js('resources/assets/js/theme.js', themeJs('theme')).sourceMaps();

// 复制第三方插件文件夹
mix.copyDirectory(dcatPath('plugins'), dcatDistPath('plugins'));
// 打包app.js
mix.js(dcatPath('js/dcat-app.js'), dcatDistPath('js/dcat-app.js')).sourceMaps();
// 打包app.scss
mix.sass(dcatPath('sass/dcat-app.scss'), dcatDistPath('css/dcat-app.css')).sourceMaps();

// 打包所有 extra 里面的所有js和css
mixAssetsDir('dcat/extra/*.js', (src, dest) => mix.js(src, dest));
mixAssetsDir('dcat/extra/*.scss', (src, dest) => mix.sass(src, dest.replace('scss', 'css')));
