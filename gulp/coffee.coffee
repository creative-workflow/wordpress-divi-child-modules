gulp       = require 'gulp'
gutil      = require 'gulp-util'
coffee     = require 'gulp-coffee'
path       = require 'path'
config     = require( path.resolve('.','config/gulp/config.coffee') )
sourcemaps = require 'gulp-sourcemaps'
include    = require 'gulp-include'


gulp.task 'divi-module-coffee', ->
  gulp.src(config.themePath + '/modules/*/js/*.coffee', {base: '.'})
      .pipe(
        include({ extensions: 'coffee' }))
      .pipe(
        sourcemaps.init())
      .pipe(
          coffee({bare: true}).on('error', gutil.log))
      .pipe(
          sourcemaps.write(config.themePath + '/assets/maps'))
      .pipe(
          gulp.dest('.'))
