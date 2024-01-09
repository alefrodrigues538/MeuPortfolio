const { src, dest, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const changed = require('gulp-changed');

function compileSass() {
  return src('./scss/*.scss')
    .pipe(changed('./css', { extension: '.css' })) // Verifica alterações apenas nos arquivos CSS
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./css'));
}

function minifyCSS() {
  return src('./css/*.css')
    .pipe(changed('./css', { extension: '.min.css' })) // Verifica alterações apenas nos arquivos CSS minificados
    .pipe(cleanCSS())
    .pipe(dest('./css'));
}

exports.build = series(compileSass, minifyCSS);
