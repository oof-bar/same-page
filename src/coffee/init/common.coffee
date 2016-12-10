module.exports = ->
  console.log 'Common'

  header = $('header')
  doc = $(document.body)
  menu_button = header.find('button.menu')
  menu = header.find('.main-menu')
  menu_is_open = false
  menu_current_action = null

  queue_menu_action = (fn, timeout = 250) ->
    window.clearTimeout menu_current_action
    # Transitions are expected to resolve within 250ms.
    menu_current_action = window.setTimeout fn, timeout

  open_menu = ->
    menu.css display: 'block'

    queue_menu_action () ->
      doc.addClass 'menu-open'
      menu_button.addClass 'menu-open'
      menu.addClass 'menu-open'
    , 0

    menu_is_open = true

  close_menu = ->
    doc.removeClass 'menu-open'
    menu_button.removeClass 'menu-open'
    menu.removeClass 'menu-open'

    queue_menu_action ->
      menu.css display: 'none'

    menu_is_open = false

  menu_button.on 'click', (e) ->
    if menu_is_open then close_menu() else open_menu()
