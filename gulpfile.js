const { stream } = require("browser-sync");
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const browserSync = require('browser-sync').create();

function style() {
    return gulp
        .src("./scss/**/*.scss")
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest("./css"))
        .pipe(browserSync.stream())
}

function watch() {
    gulp.watch("./scss/**/*.scss", style);
}

exports.style = style;
exports.watch = watch;