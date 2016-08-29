// Variables
var gulp = require('gulp');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var rucksack = require('rucksack-css');
var stylus = require('gulp-stylus');
var uglify = require('gulp-uglify');
var koutoSwiss = require('kouto-swiss');
var browserSync = require('browser-sync').create();
var lost = require('lost');
var handlebars = require('gulp-handlebars');

// Opens a new browser that sync on changes
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost/development/NameGame/", // Changes this to your folder path!
        open: true
    });
});

// Changes .styl to .css and adds autoprefixer (bye bye mixins!)
gulp.task('styles', function() {
    var processors = [
        lost,
        autoprefixer({browsers: ['last 2 version']}),
        rucksack
    ];
    gulp.src('./stylus/*.styl')
        .pipe(stylus({
            use: [koutoSwiss()]
        }))
        .pipe(postcss(processors))
        .pipe(gulp.dest('./stylesheet/'));
});

// Uglify JavaScript
gulp.task('compress', function() {
  return gulp.src('./js/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('./javascript/'));
});

// Watches changes in project
gulp.task('watch:styles', function() {
    gulp.watch('**/*.styl', ['styles']).on('change', browserSync.reload);
    gulp.watch('*.html').on('change', browserSync.reload);
    gulp.watch('**/*.js').on('change', browserSync.reload);
});

// Run 'gulp' to start project
gulp.task('default', ['watch:styles', 'browser-sync']);
