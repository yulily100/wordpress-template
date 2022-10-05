var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('sass:watch', function () {
    gulp.watch('./sass/**/*.scss', ['sass']);
});

// sass
gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulp.dest('./'));
});
gulp.task('sass-watch', function() {
  var watcher = gulp.watch('./sass/**/*.scss', gulp.series('sass', 'bs-reload'));
  watcher.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
});

//ブラウザの設定
gulp.task('browser-init', function (done) {
    browserSync.init({
        proxy: 'http://wordpresstemplate.wp/',  // Local by Flywheelのドメイン
        open: true,
        watchOptions: {
            debounceDelay: 1000  //1秒間、タスクの再実行を抑制
        }
    });
    done();
});

//リロード実行タスク
gulp.task('bs-reload', function (done) {
    browserSync.reload();
    done();
});

gulp.task('build', gulp.parallel('sass'));
gulp.task('watch', gulp.series(
  'browser-init',
  gulp.parallel('sass'),
  gulp.parallel('sass-watch')
));

gulp.task('default', gulp.series('watch'));