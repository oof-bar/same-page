module.exports = ->
  console.log 'Common'

  header = $('header')
  menu_button = header.find('button.menu')
  menu = header.find('.main-menu')
  menu_is_open = false

  menu_button.on 'click', (e) ->
    menu_is_open = !menu_is_open

    menu.animate
      opacity: if menu_is_open then 1 else 0
    ,
      queue: false
      start: ->
        if menu_is_open
          menu_button.addClass 'menu-open'
          menu.css
            display: 'block'
        else
          menu_button.removeClass 'menu-open'
      complete: ->
        if menu_is_open
          # ...
        else
          menu.css
            display: 'none'
