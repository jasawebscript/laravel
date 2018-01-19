var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var cleanCss = require('gulp-clean-css');
var browserSync = require('browser-sync').create();
var imageMin = require('gulp-imagemin');

var sassSources = ['resources/scss/**/*.scss'];

var fonts = [
    './bower_components/bootstrap/fonts/*',
    './bower_components/font-awesome/fonts/*'
];

gulp.task('sass-prod', function(){
    return gulp.src(sassSources)
        .pipe(sass())
        .pipe(cleanCss({rebase: false}))
        .pipe(gulp.dest('public/assets/css/'));
});

gulp.task('sass-dev', function(){
    return gulp.src(sassSources)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/css/'))
        .pipe(browserSync.stream());
});

gulp.task('copy-fonts', function(){
    return gulp.src(fonts)
        .pipe(gulp.dest('public/assets/fonts/'));
});

gulp.task('default', ['sass-prod', 'copy-fonts']);

gulp.task('optimize-images', function(){
    return gulp.src('public/assets/**/*.{png,jpg,gif}').pipe(imageMin([
        imageMin.jpegtran({progressive: true}),
        imageMin.optipng({optimizationLevel: 7})
    ],{
        verbose: true
    })).pipe(gulp.dest('public/assets'));
});

gulp.task('serve', ['sass-dev', 'copy-fonts'], function() {
    gulp.watch(sassSources, ['sass-dev']);
    gulp.watch("resources/views/**/*.blade.php").on("change", browserSync.reload);

    browserSync.init({
        proxy: "127.0.0.1:8000"
    });
});
