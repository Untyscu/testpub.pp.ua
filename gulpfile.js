const gulp = require('gulp');
const fs = require('fs');
const bs = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer')
const mini = require('gulp-minify')
const imagemin = require('gulp-imagemin')
const cleancss = require('gulp-clean-css')
const sass = require('gulp-sass')(require('sass'));
// sass.compiler = require('sass')

// npm i sass node-sass gulp gulp-sass gulp-clean-css gulp-imagemin@7 gulp-minify gulp-autoprefixer browser-sync --save-dev

/*
*  Create project archiectory
*/

let project = {
    src: {
        src     : "./src",
        sass    : "./src/sass",
        js      : "./src/js",
        img     : "./src/img",
        media   : "./src/media",
        fonts   : "./src/webfonts",
        addons  : "./src/addons",
        entry   : [
            "./src/index.html",
            "./src/sass/main.sass"
        ]
    },
    build: {
        src     : "./app",
        css     : "./app/css",
        js      : "./app/js",
        img     : "./app/img",
        media   : "./app/media",
        fonts   : "./app/fonts",
        addons  : "./app/addons"
    }
};

let createfs = () => {
    return gulp.src('*.*', {read: false})
    .pipe(gulp.dest(project.src.src))
    .pipe(gulp.dest(project.src.sass))
    .pipe(gulp.dest(project.src.js))
    .pipe(gulp.dest(project.src.media))
    .pipe(gulp.dest(project.src.img))
    .pipe(gulp.dest(project.src.fonts))
    .pipe(gulp.dest(project.src.addons))
    .pipe(gulp.dest(project.build.src))
    .pipe(gulp.dest(project.build.css))
    .pipe(gulp.dest(project.build.js))
    .pipe(gulp.dest(project.build.media))
    .pipe(gulp.dest(project.build.img))
    .pipe(gulp.dest(project.build.fonts))
    .pipe(gulp.dest(project.build.addons));
}

let entrypoints = (cb) => {
    project.src.entry.forEach(element => {
        fs.writeFileSync(element,"",cb);
    });
}

gulp.task(createfs);
gulp.task(entrypoints);

exports.create = gulp.series(createfs, entrypoints);

/*
* End
*/

// replace html to build
let copy = () => {
    return gulp.src('./src/**/*.html')
        .pipe(gulp.dest('./app'));
}
let addons = () => {
    return gulp.src('./src/addons/*')
        .pipe(gulp.dest('./app/addons'));
}
// replace fonts to build 
let fonts = () => {
    return gulp.src('./src/webfonts/*')
        .pipe(gulp.dest('./app/fonts'));
}
// minify and replace image to build 
let image = () => {
    return gulp.src('./src/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./app/img'));
}
// compile and replace to build sass 
let css = () => {
    return gulp.src('./src/sass/main.sass')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleancss())
        .pipe( gulp.dest('./app/css/') );
}
let js = () => {
    return gulp.src('./src/js/*.js')
        .pipe(mini({
            compress: true
        }))
        .pipe(gulp.dest('./app/js'));
}

gulp.task(copy);
gulp.task(addons);
gulp.task(fonts);
gulp.task(image);
gulp.task(css);
gulp.task(js);

/*
* Create live server
*/

let sync = () => {
    bs.init({
        server: {
            baseDir: 'app',
            open: 'local'
        }
    });
    gulp.watch('./app/css/*.css').on("change", bs.reload);
    gulp.watch('./app/js/*.js').on("change", bs.reload);
    gulp.watch('./app/**/*.html').on("change", bs.reload);
}

gulp.task(sync);

/*
* End
*/

let watch = () => {
    bs.init({
        server: {
            baseDir: 'app',
            open: 'local'
        }
    });
    gulp.watch('./src/sass/**/*.sass', css).on("change", bs.reload);
    gulp.watch('./src/img/*', image);
    gulp.watch('./src/**/*.html', copy).on("change", bs.reload);
    gulp.watch('./src/js/**/*.js', js).on("change", bs.reload);
    gulp.watch('./src/**/*.php', copy).on("change", bs.reload);
    gulp.watch('./src/addons/*', addons)
}

gulp.task(watch);

exports.default = gulp.series(copy, addons, fonts, image, css, js, watch);
