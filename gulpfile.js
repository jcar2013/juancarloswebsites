var gulp = require('gulp'),
sass = require('gulp-sass'),
sourcemaps = require('gulp-sourcemaps'),
jshint = require('gulp-jshint'),
concat = require('gulp-concat'),
path = require('path'),
cleanCSS = require('gulp-clean-css'),
imagemin = require('gulp-imagemin'),
plumber = require('gulp-plumber'),
notify = require('gulp-notify'),
browserSync = require('browser-sync').create(),
fs = require('node-fs'),
fse = require('fs-extra'),
json = require('json-file'),
jsmin = require('gulp-js-minify'),
themeName = json.read('./package.json').get('name'),
siteName = json.read('./package.json').get('siteName'),
themeDir = '../' + themeName,
plumberErrorHandler = { errorHandler: notify.onError({

	title: 'Gulp',

	message: 'Error: <%= error.message %>',

	line: 'Line: <%= line %>'

})

};
sass.compiler = require('node-sass');

// Static server
gulp.task('browser-sync', function() {
	browserSync.init({
		proxy: 'https://localhost/' + siteName,
		port: 4000
	});
});

gulp.task('sass', function () {

	return gulp.src('./sass/style.scss')

	.pipe(sourcemaps.init())

	.pipe(plumber(plumberErrorHandler))

	.pipe(sass())

	.pipe(cleanCSS())

	.pipe(concat('style.css'))

	.pipe(sourcemaps.write('./maps'))

	.pipe(gulp.dest('./'))

	.pipe(browserSync.stream());

});

gulp.task('sass2', function () {

	return gulp.src('./sass/woocommerce.scss')

	.pipe(sourcemaps.init())

	.pipe(plumber(plumberErrorHandler))

	.pipe(sass())

	.pipe(cleanCSS())

	.pipe(concat('woocommerce.css'))

	.pipe(sourcemaps.write('./maps'))

	.pipe(gulp.dest('./'))

	.pipe(browserSync.stream())

	.pipe(notify({
		message: "✔︎ CSS task complete",
		onLast: true
	}));

});

gulp.task('js', function () {

	return gulp.src('./js/juancarloswebsites.js')

	.pipe(plumber(plumberErrorHandler))

	.pipe(jshint())

	.pipe(jshint.reporter('default'))

	.pipe(jshint.reporter('fail'))

	.pipe(jsmin())

	.pipe(concat(themeName + '.min.js'))
	
	.pipe(sourcemaps.write('./maps'))

	.pipe(gulp.dest('./assets/js'))

	.pipe(browserSync.stream())

	.pipe(notify({ message: "✔︎ JS task complete"}));


});

gulp.task('imgPress', function() {

	return gulp.src('./images/*.{png,jpg,jpeg,gif,PNG,JPG,GIF,JPEG}')

	.pipe(plumber(plumberErrorHandler))

	.pipe(imagemin({

		optimizationLevel: 7,

		progressive: true

	}))

	.pipe(gulp.dest('./assets/img'))

	.pipe(browserSync.stream());

});

gulp.task('watch', function() {

	gulp.watch('./**/*.php').on('change', browserSync.reload);

	gulp.watch('./sass/**/*.scss', gulp.series(gulp.parallel('sass'))).on('change', browserSync.reload);

	gulp.watch('./js/**/*.js', gulp.series(gulp.parallel('js'))).on('change', browserSync.reload);

	gulp.watch('./images/*.{png,jpg,gif,jpeg,PNG,JPG,GIF,JPEG}', gulp.series(gulp.parallel('imgPress'))).on('change', browserSync.reload);

});

gulp.task('default', gulp.series(gulp.parallel('sass', 'js', 'imgPress', 'watch', 'browser-sync')));