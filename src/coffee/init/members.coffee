$ = require 'cash-dom'

ImageFill = require 'tasks/image-fill'

module.exports = ->
  ImageFill $('figure.avatar')
