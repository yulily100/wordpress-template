var gulp = require('gulp');
var sass = require('gulp-sass');
var browser = require('browser-sync');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var webpackStream = require('webpack-stream');
var webpack = require('webpack');
var UglifyJsPlugin = require('uglifyjs-webpack-plugin')

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
  var watcher = gulp.watch('./sass/**/*.scss', gulp.series('sass'));
  watcher.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
});

// jsビルド
var webpackConfig = {
  entry: './js/index.js',
  output: {
    filename: 'yokoito.js',
  },
  module: {
    rules: [
      { test: /\.js$/, loader: 'babel-loader' },
    ],
  },
  externals: {
    three: 'THREE',
  },
};
gulp.task('js', function () {
  const config = Object.assign(webpackConfig, {
    mode: 'production',
    plugins: [
      new UglifyJsPlugin(),
    ],
  })
  return webpackStream(config, webpack)
    .pipe(gulp.dest('./'));
});
gulp.task('js-watch', function () {
  const watchConfig = Object.assign(webpackConfig, {
    mode: 'development',
    watch: true,
  });
  return webpackStream(watchConfig, webpack)
    .pipe(gulp.dest('./'));
});

gulp.task('build', gulp.parallel('sass', 'js'));
gulp.task('watch', gulp.series(
  gulp.parallel('sass', 'js'),
  gulp.parallel('sass-watch', 'js-watch')
));
gulp.task('default', gulp.series('watch'));
