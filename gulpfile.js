/// https://codehangar.io/concatenate-and-minify-javascript-with-gulp/

const gulp = require('gulp'),
      sass = require('gulp-sass'),
      browserSync = require('browser-sync').create();
      concat = require('gulp-concat');


//compile scss into css
function style() {
    return gulp.src('src/scss/**/*.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('src/css'))
    .pipe(gulp.dest('dist/css'))
    .pipe(browserSync.stream());
}


function scripts() {
    const jsSRC = 'src/js/**/*.js',
    jsDIST = 'dist/js';
    return gulp.src(jsSRC)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(jsDIST));
}


// watcher
function watch() {
    browserSync.init({
        server: {
           baseDir: "./src",
           index: "/index.html"
        }
    });
    gulp.watch('src/scss/**/*.scss', style)
    gulp.watch('src/js/**/*.js', scripts)
    gulp.watch('src/*.html').on('change',browserSync.reload);
    gulp.watch('src/js/**/*.js').on('change', browserSync.reload);
}


exports.style = style;
exports.watch = watch;
exports.scripts = scripts;