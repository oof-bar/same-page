Cover = require 'util/cover'
ImageLoad = require 'util/image-load-notifier'

module.exports = (collection) ->
  collection.each (el, i) ->
    container = $(el)
    img = $('<img>')

    background = new Cover img
    console.log container.data 'backgroundImage'

    img.attr 'src', container.data 'backgroundImage'

    container.append img
      
    new ImageLoad img, (el) ->
      el.addClass 'loaded'
      background.resize()
