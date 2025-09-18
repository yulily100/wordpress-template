// gulpfile.js
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass-embedded')); // ★ Embedded Sass
const browserSync = require('browser-sync').create();
const plumber = require('gulp-plumber');
const autoprefixer = require('gulp-autoprefixer');

// パスは必要に応じて変更
const paths = {
  styles: {
    src: './sass/**/*.scss',
    dest: './' // 例: ルート直下にCSSを出力。css/ にしたいなら './css'
  }
};

// Sass タスク（必ず return する）
function styles() {
  return gulp.src(paths.styles.src)
    .pipe(plumber())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream()); // 変更時に注入
}

// BrowserSync 起動
function browserInit(done) {
  browserSync.init({
    proxy: 'http://wordpress-template.wp/', // Local by Flywheel のドメイン
    open: true,
    watchOptions: { debounceDelay: 1000 }
  });
  done();
}

// リロード
function reload(done) {
  browserSync.reload();
  done();
}

// 監視（Gulp 4の書き方）
function watchFiles() {
  gulp.watch(paths.styles.src, gulp.series(styles, reload));
}

// 公開タスク
exports.sass = styles;
exports.build = gulp.series(styles);
exports.watch = gulp.series(browserInit, styles, watchFiles);
exports.default = exports.watch;