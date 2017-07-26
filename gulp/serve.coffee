gulp   = require 'gulp'
reload = require('browser-sync').reload
path   = require 'path'
config = require( path.resolve('.','config/gulp/config.coffee') )

gulp.task 'divi-module-serve', [
  'divi-module-sass'
  'divi-module-coffee'
], ->

  sassFiles = [
    config.themePath + '/modules/*/css/*.sass'
  ]

  coffeeFiles = [
    config.themePath + '/modules/*/js/*.coffee'
  ]

  otherFiles = [
    config.themePath+'/modules/**/*.php'
  ]

  gulp.watch sassFiles, [ 'divi-module-sass' ]

  gulp.watch coffeeFiles, [ 'divi-module-coffee' ]

  gulp.watch otherFiles, reload
