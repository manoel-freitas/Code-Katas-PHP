const gulp = require('gulp')
const phpspec = require('gulp-phpspec')
const run = require('gulp-run')
const notify = require('gulp-notify')

gulp.task('test', () => {
    gulp.src('spec/**/*.php')
        
        .pipe(phpspec('bin/phpspec', {
            notify: true,
            clear: true,
        }))
        .on('error', notify.onError({
            title: 'Damn',
            message: 'Fail tests man!',
            icon: __dirname +'/fail.png'
        }))
        .pipe(notify({
            title: 'Yay',
            message: 'Everything works here, continue to do this great work!',
            icon: __dirname+ '/success.png'
        }));
})

gulp.task('default', () => {
    gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
})