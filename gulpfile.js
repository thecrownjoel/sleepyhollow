/// https://codehangar.io/concatenate-and-minify-javascript-with-gulp/

const gulp = require('gulp'),
      sass = require('gulp-sass'),
      browserSync = require('browser-sync').create();
      concat = require('gulp-concat');
      autoprefixer = require('gulp-autoprefixer');
      imagemin = require('gulp-imagemin');


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

function minimg() {
    gulp.src('src/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/img'))
}


// watcher
function watch() {
    browserSync.init({
        // server: {
        //    baseDir: "./src",
        //    index: "/index.html"
        // },
        proxy: 'http://sleepyhollow.local/',
        watchOptions: {
            debounceDelay: 1000 // This introduces a small delay when watching for file change events to avoid triggering too many reloads
          }
    });
    gulp.watch('src/scss/**/*.scss', style)
    gulp.watch('src/js/**/*.js', scripts)
    gulp.watch('src/img/**/*.*', minimg)
    gulp.watch('src/*.html').on('change',browserSync.reload);
    gulp.watch('src/js/**/*.js').on('change', browserSync.reload);
    gulp.watch('**/*.php').on('change',browserSync.reload);
}


exports.style = style;
exports.watch = watch;
exports.scripts = scripts;