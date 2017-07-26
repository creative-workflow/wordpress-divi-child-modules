gulp       = require 'gulp'
sass       = require 'gulp-sass'
reload     = require('browser-sync').reload
path       = require 'path'
config     = require( path.resolve('.','config/gulp/config.coffee') )
sourcemaps = require 'gulp-sourcemaps'
filter     = require 'gulp-filter'

gulp.task 'divi-module-sass', ->
  gulp.src([config.themePath + '/modules/*/css/*.sass'], {base: '.'})
      .pipe(
          sourcemaps.init())
      .pipe(
          sass(
            includePaths: [
              config.themePath + '/assets/sass'
              config.themePath + '/lib/cw/sass'
            ]
          ))
      .pipe(
          sourcemaps.write(config.themePath + '/assets/maps'))
      .pipe(
        # prevent reload on sourcemaps change
        filter(['**/*.css']))
      .pipe(
          gulp.dest( '.'))
      .pipe(
          reload(stream: true))
