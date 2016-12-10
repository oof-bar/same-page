module.exports = ->
  queue = document.body.className.split ' '

  actions =
    before: require './before'
    after: require './after'
    common: require './common'
    home: require './home'
    members: require './members'

  actions.before()
  actions.common()

  for action in queue
    actions[action]?.call()

  actions.after()
