<?php
$dir    = 'images';
$files1 = scandir($dir,1);
array_pop($files1);
array_pop($files1);
$js_array = json_encode($files1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="bower_components/loaders.css/loaders.css">
  <link rel="stylesheet" href="lib/css/normalize.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/media/style.css">
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bower_components/mdi/css/materialdesignicons.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/easing/EasePack.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js"></script>
  <script src="dist/js/chunmu.js"></script>
  <script src="dist/js/portfolio_data.js"></script>
  <title></title>
  <script type="text/javascript">
    var ary_loading_file = <?=$js_array?>;
    var mytimer
    var max = ary_loading_file.length;
    var ww = $(window).width()

    console.log("max:"+max)
    var count = 0
    resetPageView()

    for(var i=0;i<ary_loading_file.length;i++){
      piclink = "images/"+ary_loading_file[i]
      $.ajax({
          url: piclink,
          success: function() {
              count++
              ww = $(window).width()
              var pc = Math.round(count/max*100)/100
              console.log("pc:"+pc)
              var linew = Math.round(ww*pc)
              var line = $(".loading-line")
              TweenLite.to(line, 1, { width: linew })
              if(pc>=100){
                loadFinish()
              }
              //console.log("linew:"+linew)
              //console.log(" count:" + count)
          }
      });
    }
    stopInterval()
    $(document).ready(function() {
        stopInterval()
        //console.log("ready count:" + count)
        //若網頁已LOAD完但圖片或音檔還沒LOADING完，先卡住，直到LOADING完成
        if (count < max) {
            startCheck()
        } else {
          console.log("all ready");
        }
    })
    function stopInterval() {
        clearInterval(mytimer);
        timerun = false
    }
    function checkReady() {
        console.log("count:" + count + " max:" + max)
        if (count >= max) {
            stopInterval()
            //goAnim()
            loadFinish()
            console.log("ready")
        }
    }
    function startCheck() {
        mytimer = setInterval(checkReady, 100);
    }
  </script>
</head>

<body>

  <div class="loading-container">
    <div class="loading-block">
      <div class="loading-line"></div>
    </div>
  </div>
  <div class="mask-container">
    <div class="mask-block mtop"><div class="fillblock"></div></div>
    <div class="mask-block mbot"><div class="fillblock"></div></div>
  </div>
  <div class="menu"><a><i class="mdi mdi-menu hem"></i></a></div>
  <div class="home_btn">
    <a href="index.html" class="m_home">HOME</a>
  </div>
  <div class="header">
    <div class="nav-container-inner">
      <div class="nav-col right_btn">
        <a class="am1" href="#about" id="menu1">ABOUT</a>
        <a class="am2" href="#service" id="menu2">SERVICE</a>
        <a class="am3" href="#portfolio" id="menu3">PORTFOLIO</a>
      </div>
      <div class="nav-col left_btn">
        <a class="am3" href="#showreel" id="menu4">SHOWREEL</a>
        <a class="am2" href="#contact" id="menu5">CONTACT</a>
        <a class="am1 changeLang" href="#" id="menu6">LANGUAGE</a>
      </div>
      <div class="logo"><a href="index.html"><img src=""></a></div>
    </div>
  </div>
  <div class="logoanim"><img src=""></div>
  <div class="portfolio_header content-header">
      <div class="menu_second">
          <a href="#"><i class="mdi mdi-menu"></i> </a>
      </div>
      <div class="menu_second_close">
          <a href="#index"><i class="mdi mdi-close"></i></a>
      </div>
      <div class="head_midden">
          <a href="#" class="head_left"><i class="mdi mdi-chevron-left"></i></a>
          <a href="#" class="head_right"><i class="mdi mdi-chevron-right"></i></a>
      </div>
  </div>
  <!--video start-->
  <div class="video topvideo">
    <div class="vmask"></div>
    <div class="viedo_play">
      <img src="images/play.png">
    </div>
    <div class="vpic"></div>
    <video autoplay loop poster="images/2logo.png" id="bgvid" autoplay loop muted>
      <source class="v1" src="images/robot.mp4" type="video/mp4">
      <source class="v2" src="images/robot.webm" type="video/webm">
    </video>
    <video autoplay loop poster="images/2logo.png" id="bgvid2" autoplay loop muted>
      <source class="v3" src="images/robot2.mp4" type="video/mp4">
      <source class="v4" src="images/robot2.webm" type="video/webm">
    </video>
  </div>
  <!--video end-->
  <!--content-container start index-->
  <div class="content-container c_index">
    <div class="service">
      <div class="pin_ser_pic"><img src="images/chummuser.svg"></div>
      <div class="pin_ser_pic2"><img src="images/sertable.svg"></div>
      <div class="service-container-inner">
        <div class="nav-col_ser">
          <h2>SERVICE</h2>
          <div class="line_lun"><img src="images/liney.png"></div>
          <div class="font">
            <div class="st_font">MEDIA</div>
            <div class="st_font">WEB</div>
            <div class="st_font">APP</div>
            <div class="st_font">PROGRAMMIN</div>
            <a href="#service" class="seemore">SEE MORE</a>
          </div>
        </div>
      </div>
    </div>
    <div class="about">
      <div class="about_skin">
        <div class="pin_abo_pic"><img src="images/ab_02.png"></div>
        <div class="pin_abo_pic2"><img src="images/ab_01.png"></div>
        <div class="pin_abo_pic3"><img src="images/pen.svg"></div>
        <div class="about-container-inner">
          <div class="nav-col_about">
            <h2>ABOUT</h2>
            <div class="line_lun"><img src="images/linebk.png"></div>
            <div class="about_font">Chun Mu international team adhere to tailored, showing a unique design. We are committed to the highest principles of "communication", "efficiency", "quality" and "service" in the face of customers and partners. If you have any questions please
              contact us for further information.</div>
            <a href="#about" class="seemore">SEE MORE <i class="mdi mdi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--content-container end index-->
  <!--content-container start about-->
  <div class="content-container c_about">
    <div class="about2">
        <div class="pin_abo_pic_secon"><img src="images/ab_02.png"></div>
        <div class="pin_abo_pic2_secon"><img src="images/ab_01.png"></div>
        <div class="pin_abo_pic3_secon"><img src="images/pen.png"></div>
        <div class="about-container-inner">
            <div class="nav-col_about">
                <h2>ABOUT</h2>
                <div class="line_lun"><img src="images/linebk.png"></div>
                <h3>DESIGN<i class="mdi mdi-close"> </i> DEVELOP CONNECTED PRODUCTS <i class="mdi mdi-close"></i> SERVICE TOGETHER</h3>
                <div class="about_font">Chun Mu International was founded in 2009, we are committed to the pursuit of visual design and innovative technology, from HTML5 web design to film production, and even mobile device APP production, our enthusiasm for the work from the customer's trust and entrustment. Over the past few years the spring Mu continue to excellent works to obtain many domestic and foreign customers affirmed, we serve customers from the humanities industry to the technology industry, such as SONY, Siemens, Motorola, Coca-Cola, Osborne Bank. Chun Mu international team adhere to tailored, showing a unique design. We are committed to the highest principles of "communication", "efficiency", "quality" and "service" in the face of customers and partners. If you have any questions please contact us for further information.</div>
            </div>
        </div>
    </div>
  </div>
  <!--content-container end about-->
  <!--content-container start service-->
  <div class="content-container c_service">
    <div class="medser">
        <div class="chei_box">
            <div class="sermore-container-inner">
                <div class="nav-col_sermore">
                    <h2><img src="images/CM_icon01.png"></h2>
                    <h2>MEDIA</h2>
                    <div class="font">
                        <div class="st_font">MV production</div>
                        <div class="st_font">CF film production</div>
                        <div class="st_font">Corporate image film</div>
                        <div class="st_font">Interactive media production</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chei_box2">
            <div class="sermore-container-inner">
                <div class="nav-col_sermore">
                    <h2><img src="images/CM_icon02.png"></h2>
                    <h2>WEB</h2>
                    <div class="font">
                        <div class="st_font">UI design</div>
                        <div class="st_font">Web visual design</div>
                        <div class="st_font">HTML5 dynamic web design</div>
                        <div class="st_font">RWD design</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chei_box3">
            <div class="sermore-container-inner">
                <div class="nav-col_sermore">
                    <h2><img src="images/CM_icon04.png"></h2>
                    <h2>APP</h2>
                    <div class="font">
                        <div class="st_font">IOS</div>
                        <div class="st_font">ANDROID</div>
                        <div class="st_font">APP</div>
                        <div class="st_font">WINDOWS PHONE</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chei_box4">
            <div class="sermore-container-inner">
                <div class="nav-col_sermore">
                    <h2><img src="images/CM_icon03.png"></h2>
                    <h2>PROGRAMMIN</h2>
                    <div class="font">
                        <div class="st_font">Program development</div>
                        <div class="st_font">Background programming</div>
                        <div class="st_font">Website program maintenance</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--content-container end service-->
  <!--content-container start portfolio-->
  <div class="content-container c_portfolio">
    <!--portfolio_list start-->
    <div class="portfolio_list">
      <div class="portfolio-list-container">
        <div class="user">
          <div class="userpic">
            <div class="desktop-pic"><img src="images/desktop.jpg"></div>
            <div class="mobile-pic"><img src="images/mobile.jpg"></div>
            <div class="work">
              <div class="day">
                <p>
                  <img src="images/app.png"></p>
              </div>
              <div class="work_title2">
                <h3 class="p1">大港開唱MEGAPORT  FESTIVAL</h3>
                <h4 class="p2">3D  X  Modeling  X  Animation  </h4>
              </div>
            </div>
          </div>
          <div class='links'>
            <div class="link linkedin"><a href="#" target="_blank"><i class="mdi mdi-email-outline"></i></a></div>
            <div class="link vimeo"><a href="#" target="_blank"><i class="mdi mdi-vimeo"></i></a></div>
            <div class="link facebook"><a href="#" target="_blank"><i class="mdi mdi-facebook"></i></a></div>
            <!-- <div class="link website"><a href="#" class="share_icon" target="_blank"><i class="mdi mdi-email-outline"></i></a></div> -->
          </div>
        </div>

        <div class="works">

        </div>
      </div>
    </div>
    <!--portfolio_list end-->
    <!--portfolio_container start-->
    <div class="portfolio_container">
      <div class="producttopbn">
          <div class="scroll-btn">
              <div class="sprite"></div>
          </div>
          <img src="images/dd_01.jpg">
      </div>
      <div class="producst_yellowbg">
          <div class="nav_container">
              <h2>THE  SUMMER  TEMPLE  FAIR</h2>
              <div class="line_lun"><img src="images/linebk.png"></div>
              <p class="kob_font">"God of the town" music hand swim APP to rock fusion of the front of the music, combined with traditional and modern, exciting game rhythm game, experience the awkward burst of lively atmosphere!</br>
              The art of the game part of the game with the new cartoonist Zuoxuan cooperation, left Xuan took two years to draw, visit the big river many times to view interviews, delicate depicting the local real scene, touched the shining characters emotion, and draw and publish the "God of the village" the same name Comics. Game music by the Golden Melody Award winner Lin Shengxiang teacher across the knife production.
              </p>
              <p></p>
              <h4>IOS/ANDROID APP<h4>
              <h3>DESIGN<i class="mdi mdi-close"> </i> DEVELOP CONNECTED PRODUCTS <i class="mdi mdi-close"></i> SERVICE TOGETHER</h3>
          </div>
      </div>
      <div class="product_graybg">
          <div class="nav_container">
              <div class="appicon"><img src="images/appicon.jpg"></div>
              <p class="white kob_font">When the game is in the screen, the finger line will sweep up and down, sweep through the rhythm point, the more accurate point of time to get the evaluation and score higher; interference attack is in the war mode, the gas meter is full, click on the left side of the weapons Button to start the attack to interfere with the opponent; in the stand-alone mode to obtain the perfect results, you can unlock the weapons, and then can be equipped with three kinds of attacks used in the war mode.</p>
          </div>
      </div>
      <div class="picture_product">
          <div class="item02"><video src="images/robot.mp4" controls></video></div>
          <div class="item01">
              <ul class="point">
                  <a href="#"><li class="big"></li></a>
                  <a href="#"><li class="small"></li></a>
                  <a href="#"><li class="small"></li></a>
                  <a href="#"><li class="small"></li></a>
              </ul>

              <img src="images/item01.jpg"></div>
          <div class="item01"><img src="images/item02.jpg"></div>
          <div class="item01"><img src="images/item03.jpg"></div>
      </div>
    </div>
    <!--portfolio_container end-->
  </div>
  <!--content-container end portfolio-->
  <!--content-container start showreel-->
  <div class="content-container c_showreel bgyellow">
    <div class="showreel_video">
      <video preload="auto" id="bgvid_1" autoplay loop muted>
                <source src="images/robot.mp4" type="video/mp4">
              </video>
      <h4>Chun-mu Studio Showreel 2016</h4>
    </div>

    <div class="show_wrapper">
      <div class="nfc_continer">
        <div class="mov">
          <div class="left_vid">
            <video preload="auto" id="bgvid_2" autoplay loop muted>
                            <source src="images/studioshowreel.mp4" type="video/mp4">
                          </video>
          </div>
          <h4>Chun-mu Studio Showreel 2016</h4>
        </div>
        <div class="mov">
          <div class="left_vid">
            <video preload="auto" id="bgvid_3" autoplay loop muted>
                            <source src="images/robot.mp4" type="video/mp4">
                          </video>
          </div>
          <h4>Chun-mu Studio Showreel 2016</h4>
        </div>
        <div class="mov">
          <div class="left_vid">
            <video preload="auto" id="bgvid_4" autoplay loop muted>
                            <source src="images/robot.mp4" type="video/mp4">
                          </video>
          </div>
          <h4>Chun-mu Studio Showreel 2016</h4>
        </div>
        <div class="mov">
          <div class="left_vid">
            <video preload="auto" id="bgvid_5" autoplay loop muted>
                            <source src="images/robot.mp4" type="video/mp4">
                          </video>
          </div>
          <h4>Chun-mu Studio Showreel 2016</h4>
        </div>
      </div>
    </div>

  </div>
  <!--content-container end showreel-->
  <div class="footer" id="contact">
    <div class="footer-container-inner">
      <div class="nav-col_footer">
        <h2>FOLLOW & SHARE VALAIRE</h2>
        <div class="footer-row"></div>
        <div class="footer-tab contact-us">
          <h3>CONTACT US</h3>
          <p></p>
          <p><a href="mailto:service@chun-mu.com" target="_self">service@chun-mu.com</a></p>
          <p>OFFICE&nbsp;+886 2 2832 7868</p>
          <p>FAX&nbsp;+886 2 2832 7313</p>
          <p></p>
        </div>
        <div class="footer-tab follow-us">
          <h3>FOLLOW US</h3>
          <div class="footer-share">
            <a href="#" class="share_icon" target="_blank"><i class="mdi mdi-email-outline"></i></a>
            <a href="#" class="share_icon" target="_blank"><i class="mdi mdi-facebook"></i></a>
            <a href="#" class="share_icon" target="_blank"><i class="mdi mdi-vimeo"></i></a>
          </div>
          <p>©2017 Chun-Mu Studio All Rights Reserved</p>
        </div>
        <div class="footer-tab location">
          <h3>LOCATION</h3>
          <p>5F., No.200, Sec. 6, Zhongshan N. Rd., Shilin Dist.,Taipei City 111, Taiwan</p>
          <p class="footer-map"> <a href="#" target="_blank"> <span class="sprite sprite-map"></span>VIEW IN MAP </a> </p>
        </div>


      </div>
    </div>
  </div>
  <!--main menu start-->
  <div class="fullpage mainmenu note_bg">
    <div class="portfolio_header menu-header">
      <div class="menu_close">
        <a><i class="mdi mdi-close"></i></a>
      </div>
      <div class="head_midden margintop">
        <a href="#" class="head_left">TW</a>
        <a href="#" class="head_right">EN</a>
      </div>
    </div>
    <div class="nowt_midden">
      <div class="line_lun"><img src="images/linebk2.png"></div>
      <a href="#about" class="ew_btn">ABOUT</a>
      <a href="#service" class="ew_btn">SERVICE</a>
      <a href="#portfolio" class="ew_btn">PORTFOLIO</a>
      <a href="#showreel" class="ew_btn">SHOWREEL</a>
    </div>

    <div class="nav_container">
      <h3 class="black">FOLLOW & SHARE VALAIRE</h3>
      <div class="center_aa">
        <a href="#" class="share_icon2" target="_blank"><i class="mdi mdi-email-outline"></i></a>
        <a href="#" class="share_icon2" target="_blank"><i class="mdi mdi-facebook"></i></a>
        <a href="#" class="share_icon2" target="_blank"><i class="mdi mdi-vimeo"></i></a>
        <p>©2017 Chun-Mu Studio All Rights Reserved</p>
      </div>
    </div>
  </div>
  <!--main menu end-->

  <script type="text/javascript">
    var pageName = "#index"
    var h_video = $(".topvideo").height()
    var h_service = $(".c_service").height()
    var h_cindex = $(".c_index").height()
    var h_about = $(".c_about").height()
    var h_portfolio = $(".c_portfolio").height()
    var h_showreel = $(".c_showreel").height()
    var ww = $(window).width()
    var hh = $(window).height()
    var vwpc = ww / 100 * 10
    var am1 = $(".am1"),
        am2 = $(".am2"),
        am3 = $(".am3"),
        hem = $(".hem")
    var home_btn = $(".home_btn")
    var blacktop = $(".mask-block.mtop .fillblock")
    var blackbot = $(".mask-block.mbot .fillblock")
    var tm1
    $(window).on('hashchange', function(e){
        var hash = location.hash
        console.log("hashchange hash:"+hash)
        switch(hash){
          case "#about":
          break
          case "#service":
          break
          case "#portfolio":
          break
          case "#showreel":
          break
          case "#contact":
          break
          default:
          console.log("default hash:"+hash)
          break

        }
    });
    //當他按了瀏覽器上下一頁按鈕
    /*if (window.history && window.history.pushState) {

      $(window).on('popstate', function() {
        alert("popstate")
        goPageOut()
      });

    }*/
    $(window).on("load", function(e) {
      $('html, body').scrollTop(0);
      //TweenLite.defaultOverwrite = "all";
      resetPageView()
      console.log("on load")
      /*var line = $(".loading-line")
      var ww = $(window).width()
      TweenLite.to(line, 0.5, {
        width: ww,
        onComplete: loadFinish
      })*/
      var hh2 = $(window).height() / 2
      var hh = hh2 + $(window).width() * 0.088

      $(".viedo_play img").hover(function(){
        $(this).attr("src","images/CM_icon07.png")
      },function(){
        $(this).attr("src","images/play.png")
      })

    })
    function init() {
      console.log("init")
      $(window).on('hashchange', function(e){
         var hash = window.location.hash
         console.log("hash:"+hash)
      });
      $(".menu").click(function() {
        showMenu()
      })
      $(".menu_second").click(function() {
        showMenu()
      })
      $(".menu_close").click(function() {
        hideMenu()
      })
      $(".menu_second_close").click(function() {
        console.log("menu_second_close")
        resetMenu("")
        goPageOut2()
        //resetContent()
        //initIndex()
        /*if(pageName=="#showreel"){
          initIndex()
        }else if(pageName=="#portfolio"){
          initPortfolio()
        }*/

      })
      $(".ew_btn").click(function(){
        hideMenu()
        //setTimeout(checkNowPage,800)
        setSimplePage()
        setTimeout(goPageIn,800)
      })
      $("a.gowork").click(function(){
        initPortfolio_page()
      })

      $("#menu1").click(function(){
          if($(this).hasClass("on")){
            return
          }
          resetMenu($(this))
          goPageOut()
      })
      $("#menu2").click(function(){
        if($(this).hasClass("on")){
          return
        }
          resetMenu($(this))
          goPageOut()
      })
      $("#menu3").click(function(){
        if($(this).hasClass("on")){
          return
        }
          resetMenu($(this))
          //goPageOut()
          goPageOut2()
      })
      $("#menu4").click(function(){
        console.log("pageName:"+pageName)
        if($(this).hasClass("on")){
          return
        }
          resetMenu($(this))
          goPageOut2()
      })
      $("#menu5").click(function(){
        $('html, body').animate({
          scrollTop: $("#contact").offset().top
        }, 1000, function(){

        });
      })
      $(".changeLang").click(function() {
        showMenu()
      })
    }


    function goPageOut(){
      TweenMax.killAll();
      var tl = new TimelineLite();
      var vmask = $(".vmask")
      var video = $(".topvideo")
      var index = $(".c_index")
      var about = $(".c_about")
      var service = $(".c_service")
      var showreel = $(".c_showreel")

      switch(pageName){
        case "#index":
          $(".c_index").addClass("gohide")
          tl.to(vmask,0.8,{height:h_video, ease: Power4.easeOut})
            .to(video,0.6,{height:0, ease: Power4.easeIn},0.4)
            .to(index,1.8,{height:0, ease: Power2.easeInOut, onComplete:goPageIn},0.4)
        break
        case "#about":
          $(".c_about").addClass("gohide")
          tl.to(vmask,0.8,{height:h_video, ease: Power4.easeOut})
            .to(video,0.6,{height:0, ease: Power4.easeIn},0.4)
            .to(about,1.8,{height:0, ease: Power2.easeInOut, onComplete:goPageIn},0.4)
          break
        case "#service":
          tl.to(vmask,0.8,{height:h_video, ease: Power4.easeOut})
            .to(video,0.6,{height:0, ease: Power4.easeIn},0.4)
            .to(service,1.8,{height:0, ease: Power2.easeInOut, onComplete:goPageIn},0.4)
          break
      }
    }
    //showreel portfolio
    function goPageOut2(){
      console.log("goPageOut2")
      var hh = $(window).height()/2
      var ww = $(window).width()/100*10
      var bh = hh+ww
      var tl = new TimelineLite();
      blacktop.show()
      blackbot.show()
      console.log("bh:"+bh)
      blacktop.css("height",bh)
      blackbot.css("height",bh)
      blacktop.css("top",bh)
      blackbot.css("bottom",bh)
      tl.to(blacktop,0.8,{top:0, ease: Power4.easeIn},0)
        .to(blackbot,0.8,{bottom:0, ease: Power4.easeIn, onComplete:goPageIn},0)
        .to(blackbot,0.8,{bottom:0, ease: Power4.easeIn, onComplete:goPageIn},0)
        TweenLite.set($(".menu_second_close"),{right:0, opacity:1})
        TweenLite.to($(".menu_second_close"),1,{right:-50, opacity:1, ease:Back.easeIn.config(3), overwrite: true})
        $(".content-header").slideUp()

    }
    function goPageIn(){
      $(".content-container").removeClass("gohide")
      pageName = checkNowPage()
      console.log("goPageIn pageName:"+pageName)
      blacktop.hide()
      blackbot.hide()
      switch(pageName){
        case "#index":
          initIndex()
        break
        case "#about":
          initAbout()
        break
        case "#service":
          initService()
        break
        case "#portfolio":
          initPortfolio()
        break
        case "#showreel":
          initShowReel()
        break
      }
    }
    function initIndex(){
      resetMenu()
      setSimplePage()
      var tl = new TimelineLite();
      var about = $(".about_skin")
      var vmask = $(".vmask")
      var video = $(".topvideo")
      var logo = $(".logo")
      var service = $(".service")
      var hh = $(window).height()/2
      var ww = $(window).width()
      var wpc = $(window).width()/100*10
      var bh = hh+wpc
      blacktop.css("top",bh)
      blackbot.css("bottom",bh)
      $(".c_index").css("display","block")
      if (ww >= 1097) {
        tl.to(about,1,{top:0,opacity:1, ease: Power4.easeOut},0)
          .to(video,0.8, {height: h_video, ease: Back.easeOut.config(2.5)},0.3)
          .to(vmask, 0.8, {height: 0,ease: Power4.easeIn,onComplete: unFreeze}, 0.8)
          .to(service, 0.8, {height: h_service,ease: Back.easeOut.config(2.5)}, 1.5)
          .from(logo, 0.8, {top: -300, ease: Back.easeOut.config(2.5)}, 0.3)
          .from(am3, 0.8, {top: -200,ease: Back.easeOut.config(2.5)}, 0.4)
          .from(am2, 0.8, {top: -200,ease: Back.easeOut.config(2.5)}, 0.5)
          .from(am1, 0.8, {top: -200,ease: Back.easeOut.config(2.5)}, 0.6)
          .from(hem, 1, {left: -200,ease: Back.easeOut.config(2.5)}, 0.7)
      } else {
        console.log("t1_2")
          tl.to(about,1,{top:0,opacity:1, ease: Power4.easeOut},0)
            .to(service, 0.8, {height: h_service,ease: Back.easeOut.config(2.5)}, 0.3)
            .to(video,1, {height: h_video, ease: Back.easeOut.config(2.5)},1)
            .to(vmask, 0.8, {height: 0,ease: Power4.easeIn,onComplete: unFreeze}, 1.5)
      }
    }
    function initAbout(){
      console.log("initAbout")
      resetContent()
      resetMenu($("#menu1"))
      var about = $(".c_about")
      var vmask = $(".vmask")
      var video = $(".topvideo")
      $(".vpic").show()
      $("video").hide()
      $(".viedo_play").hide()
      var tl = new TimelineLite();

      about.show()
      about.css("height",0)
      about.css("overflow","hidden")
      vmask.css("height",h_video)
      tl.to(video,1, {height: h_video/2, ease: Power4.easeOut})
        .to(vmask, 0.5, {height: 0,ease: Power4.easeOut}, 0.7)
        .to(about,1,{height:h_about, ease: Power4.easeInOut},1)

      if (document.all && window.atob) {
        // Firefox breaks with 'background-position'
        // IE10 breaks with 'backgroundPosition'
        // bodge to workaround
        tm1 = TweenMax.fromTo($('.vpic'), 60,
          {css:{'background-position': "0px 0px"}},
          {css:{'background-position': "1280px 788px"}, repeat: -1, delay:0, repeatDelay: 0, ease: Linear.easeNone }
        );
      } else {
        tm1 = TweenMax.fromTo($('.vpic'), 60,
          {css:{backgroundPosition:  "0px 0px"}},
          {css:{backgroundPosition:  "1280px 788px"}, repeat: -1, delay:0, repeatDelay: 0, ease: Linear.easeNone }
        );
      }
    }
    function initService(){
      console.log("initService")
      resetContent()
      resetMenu($("#menu2"))
      var service = $(".c_service")
      var vmask = $(".vmask")
      var video = $(".topvideo")
      $("#bgvid").hide()
      $("#bgvid2").show()
      $(".viedo_play").hide()
      var tl = new TimelineLite();
      $(".c_service").show()
      $(".c_service").css("height",0)
      $(".c_service").css("overflow","hidden")
      $(".vmask").css("height",h_video)
      tl.to(video,1, {height: h_video, ease: Power4.easeOut})
        .to(vmask, 0.5, {height: 0,ease: Power4.easeOut}, 0.7)
        .to(service,1,{height:h_service, ease: Power4.easeInOut},1)
    }
    function initPortfolio(){
      console.log("initPortfolio")
      resetContent()
      showPortfolioTop()
      $(".portfolio_list").show()
      $(".portfolio_container").hide()
      $(".head_midden").hide()
      $(".c_portfolio").show()
      setTimeout(hideOut2Mask,800)
    }
    function initPortfolio_page(){
      $(".head_midden").show()
      $(".portfolio_list").hide()
      $(".portfolio_container").show()
    }
    function initShowReel(){
      var hh = $(window).height()/2
      var ww = $(window).width()/100*9
      var bh = hh+ww
      console.log("initShowReel")
      setSimplePage()
      showPortfolioTop()
      $(".head_midden").hide()
      //resetContent()
      var showreel = $(".c_showreel")
      showreel.show()
      showreel.css("height",0)
      showreel.css("overflow","hidden")
      var tl = new TimelineLite();
      tl.to(showreel,1, {height: h_showreel, ease: Power4.easeOut})
    }
    function loadFinish() {
      var line = $(".loading-line")
      var loading = $(".loading-container")
      //loading完，把loading線收起來
      $(".loading-line").css("right", 0)
      TweenLite.to(line, 0.5, {
        width: 0,
        onComplete: hideLoad
      })
      init()
    }

    function hideLoad() {
      $(".loading-line").hide()
      var str_logo = '<a href="index.html"><img src="images/CM_icon05.png"></a>'
      $(".logoanim").html(str_logo)
      //$(".logoanim img").attr("src","images/CM_icon05.png")
      LoadingOut()
    }
    function hideLoadmask(){
      $(".loading-container").hide()
    }

    function LoadingOut() {
      console.log("LoadingOut")
      var tl = new TimelineLite();
      var loading = $(".loading-container")
      var logo = $(".logo")
      var about = $(".about_skin")
      var vmask = $(".vmask")
      var video = $(".topvideo")
      var service = $(".service")
      var service_L = $(".pin_ser_pic")
      var service_M = $(".service-container-inner")
      var service_R = $(".pin_ser_pic2")
      var ww = $(window).width()
      var hh = $(window).height()
      var vwpc = ww / 100
      var h_header = $(".header").height()
      var logoanim =   $(".logoanim")
      var tt0 = "22px"
      var fh1 = h_header - vwpc * 9
      var fh2 = fh1 + h_video
      var fh3 = hh+h_service
      //var fh1 = headerh+vwpc*16.5
      $(".service").css("height",0)
      $(".topvideo").css("height",0)
      $(".about_skin").css("opacity",0)
      $(".about_skin").css("top",-100)
      $("#bgvid").show()
      $("#bgvid2").hide()
      //hideLoadmask()
      if (ww >= 1097) {
        console.log("t1_1")
          tl.set(service, {opacity:0})
            .set(about, {height:h_about+500})
            .to(logoanim,2.3, {onComplete:hideLoadmask},0)
            .to(logoanim,1, {top: tt0, ease: Power4.easeInOut,onComplete: unFreeze},1.5)
            .to(video,1, {height: h_video, ease: Back.easeOut.config(2.5)},2.5)
            .to(about,0.5,{top:0,height:h_about,opacity:1, ease: Power4.easeOut},2.7)
            .to(vmask, 0.5, {height: 0,ease: Power4.easeIn}, 3.0)
            .to(service, 0.8, {opacity:1, height: h_service,ease: Back.easeOut.config(2.5)}, 3.7)
            .from(am3, 0.8, {top: -200,ease: Back.easeOut.config(2.5)}, 2.6)
            .from(am2, 0.8, {top: -200,ease: Back.easeOut.config(2.5)}, 2.7)
            .from(am1, 0.8, {top: -200,ease: Back.easeOut.config(2.5)}, 2.8)
            .from(hem, 1, {left: -200,ease: Back.easeOut.config(2.5)}, 2.9)
      } else {
        console.log("t1_2")
        tl.set(service, {opacity:0})
          .set(about, {height:h_about+500})
          .to(logoanim,2.3, {onComplete:hideLoadmask},0)
          .to(logoanim,1, {top: tt0, ease: Power4.easeInOut,onComplete: unFreeze},1.5)
          .to(video,1, {height: h_video, ease: Back.easeOut.config(2.5)},2.5)
          .to(about,0.5,{top:0,height:h_about,opacity:1, ease: Power4.easeOut},2.7)
          .to(vmask, 0.5, {height: 0,ease: Power4.easeIn}, 3.3)
          .to(service, 0.8, {opacity:1, height: h_service,ease: Back.easeOut.config(2.5)}, 4)
          .from(home_btn, 0.8, {right: -200,ease: Back.easeOut.config(1)}, 2.9)
          .from(hem, 1, {left: -200,ease: Back.easeOut.config(2.5)}, 2.9)
      }
    }


  </script>
</body>

</html>
