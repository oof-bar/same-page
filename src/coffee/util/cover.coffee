$ = require 'cash-dom'

Sizer = require 'util/sizer'

module.exports = class Cover
  constructor: (@content, min = 0, max = Infinity) ->
    new Sizer
      min: min
      max: max
      onactive: (e) =>
        @resize e

    @resize()

  resize: (e) ->
    # Images may switch contexts, so re-fetch this, each time
    context = @content.parent()

    @content.css
      width: ''
      marginLeft: ''
      marginTop: ''

    img =
      width: @content.outerWidth()
      height: @content.outerHeight()
      ratio: @content.outerWidth() / @content.outerHeight()

    env =
      width: context.outerWidth()
      height: context.outerHeight()
      ratio: context.outerWidth() / context.outerHeight()


    if env.ratio < img.ratio
      @content.css
        width: "#{ Math.ceil img.ratio * env.height }px"
        marginLeft: "#{ Math.ceil (env.width - (img.ratio * env.height)) / 2 }px"
        marginTop: 0

    else
      @content.css
        width: "#{ env.width }px"
        marginLeft: 0
        marginTop: "#{ Math.floor (env.height - (env.width / img.ratio)) / 2 }px"
