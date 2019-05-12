var gulp					= require('gulp');
var $							= require('gulp-load-plugins')();
var autoprefixer	= require('autoprefixer');
var concat				= require('gulp-concat');
var uglify				= require('gulp-uglify');
var rename				= require('gulp-rename');

var sassPaths = [
	'node_modules/foundation-sites/scss',
	'node_modules/motion-ui/src'
];

var editorSassPaths = [
	'scss/_settings.scss',
	'scss/editor.scss'
]

function sass() {
	return gulp.src('scss/app.scss')
		.pipe($.sass({
			includePaths: sassPaths,
			outputStyle: 'compressed' // if css compressed **file size**
		})
			.on('error', $.sass.logError))
		.pipe($.postcss([
			autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] })
		]))
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('css'))
};

function editor() {
	return gulp.src('scss/editor.scss')
		.pipe($.sass({
			includePaths: sassPaths,
			outputStyle: 'compressed' // if css compressed **file size**
		})
			.on('error', $.sass.logError))
		.pipe($.postcss([
			autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] })
		]))
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('css'))
};

function scripts() {
	return gulp.src(
		[
			'node_modules/what-input/dist/what-input.js',
			// Foundation core - needed if you want to use any of the components below
			'node_modules/foundation-sites/dist/js/plugins/foundation.core.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.util.*.js',
			// Pick the components you need in your project
			'node_modules/foundation-sites/dist/js/plugins/foundation.abide.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.accordion.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.accordionMenu.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.drilldown.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.dropdown.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.dropdownMenu.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.equalizer.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.interchange.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.offcanvas.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.orbit.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.responsiveMenu.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.responsiveToggle.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.reveal.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.slider.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.smoothScroll.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.magellan.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.sticky.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.tabs.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.responsiveAccordionTabs.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.toggler.js',
			'node_modules/foundation-sites/dist/js/plugins/foundation.tooltip.js',
			// Other
			'js/custom.js',
			'js/skip-link-focus-fix.js'
		]
	)
		.pipe(concat('app.js'))
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('js'));
};

// Watch files
function watch() {
	gulp.watch('scss/*.scss', sass);
	gulp.watch(editorSassPaths, editor);
	gulp.watch('js/custom.js', scripts);
}

gulp.task('sass', sass);
gulp.task('sass', editor);
gulp.task('scripts', scripts);
gulp.task('watch', watch);
gulp.task('default', gulp.series(scripts, sass, editor, watch));
gulp.task('build', gulp.series(scripts, sass, editor));
