$ ->
  $(".login--container").removeClass("preload")
  @timer = window.setTimeout =>
    $(".login--container").toggleClass("login--active")
  , 2000

  $(".js-toggle-login").click =>
    window.clearTimeout(@timer)
    $(".login--container").toggleClass("login--active")
    $(".login--username-container input").focus()
    