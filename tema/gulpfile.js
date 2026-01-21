const {series, src, dest, parallel, watch} = require("gulp");

const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat");
const CleanCSS = require("gulp-clean-css");
const npmdist = require("gulp-npm-dist");
const rename = require("gulp-rename");
const rtlcss = require("gulp-rtlcss");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));
const uglify = require("gulp-uglify");

const paths = {
    baseSrcAssets: "src/assets/",   // source assets directory
    baseDistAssets: "src/assets/",  // build assets directory
};

const vendor = function () {
    const jsOut = paths.baseDistAssets + "js/";

    // vendor.min.js
    src([
        "./node_modules/jquery/dist/jquery.min.js",
        "./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
        "./node_modules/iconify-icon/dist/iconify-icon.min.js",
        "./node_modules/simplebar/dist/simplebar.min.js",
        "./node_modules/lucide/dist/umd/lucide.min.js",

        "./node_modules/custombox/dist/custombox.min.js",
        "./node_modules/node-waves/dist/waves.min.js",
        "./node_modules/flatpickr/dist/flatpickr.min.js",  // Flatpickr
        "./node_modules/select2/dist/js/select2.min.js",   // select2
        "./node_modules/inputmask/dist/inputmask.min.js",  // inputmask
        "./node_modules/waypoints/lib/jquery.waypoints.min.js", // waypoints js
        "./node_modules/jquery.counterup/jquery.counterup.min.js", // counterup js
    ])
        .pipe(concat("vendor.js"))
        .pipe(uglify())
        .pipe(rename({suffix: ".min"}))
        .pipe(dest(jsOut));

    const cssOut = paths.baseDistAssets + "css/";

    // vendor.min.css
    src([
        "./node_modules/flatpickr/dist/flatpickr.min.css",
        "./node_modules/select2/dist/css/select2.min.css",
        "./node_modules/custombox/dist/custombox.min.css",
    ])

        .pipe(concat("vendor.css"))
        .pipe(CleanCSS())
        .pipe(rename({suffix: ".min"}))
        .pipe(dest(cssOut));

    const out = paths.baseDistAssets + "vendor/";
    return src(npmdist(), {base: "./node_modules"})
        .pipe(rename(function (path) {
            path.dirname = path.dirname.replace(/\/dist/, '').replace(/\\dist/, '');
        }))
        .pipe(dest(out));
};


const scss = function () {
    const out = paths.baseDistAssets + "css/";

    src([paths.baseSrcAssets + "scss/**/*.scss", "!" + paths.baseSrcAssets + "scss/icons.scss", "!" + paths.baseSrcAssets + "scss/icons/*.scss"])
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError)) // scss to css
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 2 versions"],
            })
        )
        .pipe(dest(out))
        .pipe(CleanCSS())
        .pipe(rename({suffix: ".min"}))
        .pipe(sourcemaps.write("./")) // source maps
        .pipe(dest(out));

    // generate rtl
    return src([paths.baseSrcAssets + "scss/**/*.scss", "!" + paths.baseSrcAssets + "scss/icons.scss", "!" + paths.baseSrcAssets + "scss/icons/*.scss"])
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError)) // scss to css
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 2 versions"],
            })
        )
        .pipe(rtlcss())
        .pipe(rename({suffix: "-rtl"}))
        .pipe(dest(out))
        .pipe(CleanCSS())
        .pipe(rename({suffix: ".min"}))
        .pipe(sourcemaps.write("./")) // source maps
        .pipe(dest(out));
};

const icons = function () {
    const out = paths.baseDistAssets + "css/";
    return src([paths.baseSrcAssets + "scss/icons.scss", paths.baseSrcAssets + "scss/icons/*.scss"])
        .pipe(sourcemaps.init())
        .pipe(sass.sync()) // scss to css
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 2 versions"],
            })
        )
        .pipe(dest(out))
        .pipe(CleanCSS())
        .pipe(rename({suffix: ".min"}))
        .pipe(sourcemaps.write("./")) // source maps
        .pipe(dest(out));
};


function watchFiles() {
    watch(paths.baseSrcAssets + "scss/icons.scss", series(icons));
    watch([paths.baseSrcAssets + "scss/**/*.scss", "!" + paths.baseSrcAssets + "scss/icons.scss", "!" + paths.baseSrcAssets + "scss/icons/*.scss"], series(scss));
}

// Production Tasks
exports.default = series(
    vendor,
    parallel(scss, icons),
    parallel(watchFiles)
);

// Build Tasks
exports.build = series(
    vendor,
    parallel(scss, icons)
);