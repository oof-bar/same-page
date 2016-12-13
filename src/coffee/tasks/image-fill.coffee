Cover = require 'util/cover'
ImageLoad = require 'util/image-load-notifier'

module.exports = (collection) ->
  collection.each (i, el) ->
    container = $(el)
    img = $('<img />')

    background = new Cover img
    container.data 'background-image'

    img.attr 'src', container.data 'background-image'

    container.append img
      
    new ImageLoad img, (el) ->
      el.addClass 'loaded'
      background.resize()
