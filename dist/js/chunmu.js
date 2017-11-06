

function checkNowPage(){
  var hash = window.location.hash
  console.log("hash:"+hash)
  return hash
}

function showMenu() {
  var ww = $(window).width()
  var hh = $(window).height()
  var tl = new TimelineLite();
  var langtop = $(".head_midden")
  var menubody = $(".nowt_midden")
  var menunav = $(".nav_container")
  var menuclose = $(".menu_close")
  $(".head_midden").show()
  TweenLite.set(menubody,{skewY:-10, opacity:1})
  TweenLite.to(menubody,0.5,{delay:0.5,skewY:0})
  TweenLite.to(menuclose,2,{rotationY:360})
  TweenLite.set(menunav,{bottom:-300,opacity:1})
  TweenLite.set(langtop,{bottom:-100,opacity:1})
  tl.from(langtop, 1, {top:-100, opacity:1, ease:Back.easeOut.config(1)})
    .from(menubody, 1, {top:hh, opacity:1, ease:Back.easeOut.config(1)},0.2)
    .to(menunav, 1, {bottom:0, opacity:1, ease:Back.easeOut.config(1)},0.6)
    .to(menuclose, 1, {right:0, opacity:1, ease:Back.easeOut.config(1)},0.6)

  $(".mainmenu").slideDown(400)
}

function hideMenu() {
  var ww = $(window).width()
  var hh = $(window).height()
  var tl = new TimelineLite();
  var langtop = $(".head_midden")
  var menubody = $(".nowt_midden")
  var menunav = $(".nav_container")
  var menuclose = $(".menu_close")

  tl.to(langtop, 0.5, {opacity:0,ease:Power4.easeOut})
    .to(menubody, 0.5, {opacity:0,ease:Power4.easeOut},0.2)
    .to(menunav, 0.5, {opacity:0,ease:Power4.easeOut},0.4)
    .to(menuclose, 0.5, {right:-100,ease:Power4.easeOut},0)
  $(".mainmenu").slideUp(1000, function() {
    var tl = new TimelineLite();
    var hem = $(".hem"),
      home_btn = $(".home_btn")
    tl.from(hem, 0.5, {
        left: -200,
        ease: Back.easeOut.config(1)
      })
      .from(home_btn, 0.5, {
        right: -200,
        ease: Back.easeOut.config(1)
      }, "-=0.5")

  })
}
function goFreeze(){
  $("body").addClass("onloading")
}
function unFreeze() {
  $("body").removeClass("onloading")
  $('html, body').scrollTop(0);
}

function resetPageView() {
  $('html, body').scrollTop(0);
  $("body").addClass("onloading")
  $(".mainmenu").hide()
  resetContent()
  $(".c_index").show()
}
function resetContent(){
  hidePortfolioTop()
  $(".content-container").hide()
}
function showPortfolioTop(){
  $(".content-header").slideDown()
  $(".topvideo").slideUp()
  $(".header").slideUp()
  $(".menu").slideUp()
  TweenLite.set($(".menu_second_close"),{right:-50, opacity:1})
  TweenLite.to($(".menu_second_close"),1,{right:0, opacity:1, ease:Back.easeOut.config(2), overwrite: true})
}
function hidePortfolioTop(){
  TweenLite.set($(".menu_second_close"),{right:0, opacity:1})
  TweenLite.to($(".menu_second_close"),1,{right:-50, opacity:1, ease:Back.easeIn.config(3), overwrite: true})
  $(".content-header").slideUp()
  $(".topvideo").slideDown()
  $(".header").slideDown()
  $(".menu").slideDown()
}

function resetMenu(obj){
  for(var i=1;i<=4;i++){
    $("#menu"+i).removeClass("on")
  }
  if(obj){
      obj.addClass("on")
  }

}
