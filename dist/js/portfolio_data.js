$(function(){

	var typeimg = ["","app.png","media.png","pro.png","web.png"]
	var portfolio=[[]]

	//console.log("portfolio.length:"+portfolio)
	//["名稱","類型","類型代號"]
	//***類型代號***
	//1:app
	//2:media
	//3:program
	//4:web
	//*************

	portfolio[0] = ["大港開唱 AR","AR 3D  X  Modeling  X  Animation  ",1]
	portfolio[1] = ["台南歷史地圖","IOS/ANDROID  APP Object-C  X  Graphic Design",1]
	portfolio[2] = ["臺北歷史地圖","IOS/ANDROID  APP Object-C  X  Graphic Design",1]
	portfolio[3] = ["音速空間VR","VR 3D  X  Modeling  X  Animation  ",1]
	portfolio[4] = ["大港開唱 AR","AR 3D  X  Modeling  X  Animation ",1]
	portfolio[5] = ["大港開唱","IOS/ANDROID  APP Concept  X  Graphic Design  X  Object-C",1]
	portfolio[6] = ["艾訊影片 2014 3D","CORPORATE FLIM 3D  X  Modeling  X  Animation  ",4]
	portfolio[7] = ["艾訊影片 2015 2D","CORPORATE FILM 2D  X  Mograph",4]
	portfolio[8] = ["艾訊影片 2016 3D","CORPORATE FLIM 3D  X  Modeling  X  Animation ",4]
	portfolio[9] = ["艾訊影片 2017 3D","CORPORATE FLIM 3D  X  Modeling  X  Animation",4]
	portfolio[10] = ["艾訊影片 2017 2D","CORPORATE FILM 2D  X  Mograph",4]
	portfolio[11] = ["艾訊科技 AXIOMTEK","Art Concept  X  HTML  X  CSS  X  System Programing  X  RWD",4]
	portfolio[12] = ["經濟部國際貿易局","HTML  X  CSS  X  Art Concept  X  RWD",4]
	portfolio[13] = ["光泉KUANG CHUAN","HTML  X  CSS  X  Art Concept  X  RWD",4]
	portfolio[14] = ["光泉KUANG CHUAN","HTML  X  CSS  X  Art Concept  X  RWD",4]
	portfolio[15] = ["外貿協會影片 2015","2D  X  Mograph",4]
	portfolio[16] = ["外貿協會影片 2016","2D  X  Mograph",4]
	portfolio[17] = ["閃靈樂團 CHOTHNIC","IOS  APP Concept  X  Graphic Design  X  3D  X  Object-C",4]
	portfolio[18] = ["暮沉武德殿","MV VFX Smoke Simulate X 3D X Charactor Acting X Modeling",4]
	portfolio[19] = ["音速空間VR","VR 3D X Modeling X Animation",4]
	portfolio[20] = ["音速空間","IOS/ANDROID  APP Concept  X  Graphic Design  X  Object-C",4]
	portfolio[21] = ["台灣書院 TAIWAN ACDEMY","Art Concept  X  Flash  X  Motion Design  X  HTML",4]
	portfolio[22] = ["財團法人台灣癌症基金會","Art Concept  X  HTML  X  CSS",4]
	portfolio[23] = ["神之鄉","IOS/ANDROID  APP Concept  X  Graphic Design  X   Object-C",4]
	portfolio[24] = ["中央研究院數位文化中心","IOS/ANDROID  APP Concept  X  Graphic Design  X  Object-C",4]
	portfolio[25] = ["台博館 立體投影","AR VIDEO Character Acting  X  3D  X  Modeling",4]
	portfolio[26] = ["WiDGET","Corpporate  Film Art Concept  X  Modeling  X  Motion Design",4]
	portfolio[27] = ["隆達電子 Lextar","2D  X  3D  X  Modeling  X  Animation",4]
	portfolio[28] = ["撼訊科技影片","IDENT VIDEO Art Concept  X  Motion Design  X  3D",4]
	portfolio[29] = ["中小企業處沙盒","HTML  X  CSS  X  Art Concept  X  RWD",4]
	portfolio[30] = ["臺北市勞動檢查處","HTML  X  CSS  X  Art Concept ",4]
	portfolio[31] = ["科工館電視牆","3D  X  2D  X  Modeling  X  Animation ",4]
	portfolio[32] = ["國貿局影片 2017","PROPAGANDA FILM 2D  X  Mograph",4]
	portfolio[33] = ["御奠園「資源不浪費 愛心不打烊」動畫片","PROPAGANDA FILM 2D  X  Mograph",4]
	portfolio[34] = ["巧克力共和國","AR VIDEO Character Acting  X  3D  X  Modeling",4]
	portfolio[35] = ["烹調的科學","Movie Film shooting  X  Post-production",4]
	portfolio[36] = ["殭屍大戰人類","3D  X  Modeling",4]
	portfolio[37] = ["t-bricks CIS","Concetp X Design X Applications",4]








	var total = portfolio.length
	for (i=1 ;i<total ; i++){
		var ary = portfolio[i]
		var typepic = typeimg[ary[2]]
		$(".works").append('<div class="work">' +
											'<a class="gowork" href="#job'+i+'">' +
											'<div class="pic"><img src="images/day'+i+'.jpg"></div>' +
											'<div class="day">' +
											'<p><img src="images/'+typepic+'" style=""></p>' +
											'</div>' +
											'<div class="work_title">' +
											'<h3 class="p1">'+ary[0]+'</h3>' +
											'<h4 class="p2">'+ary[1]+'</h4>' +
											'</div>' +
											'<div class="loader" style="display: none;">' +
											'<div class="loader-inner cube-transition">' +
											'<div></div>' +
											'</div>' +
											'</div>' +
											'</a></div>');

	}
	//設定大圖
	var bigtype = typeimg[portfolio[0][2]]
	var bigtitle = portfolio[0][0]
	var bigsubtitle = portfolio[0][1]
	$(".userpic .desktop-pic img").attr("src","images/day0_desktop.jpg")
	$(".userpic .mobile-pic img").attr("src","images/day0_mobile.jpg")
	$(".userpic .work .day p img").attr("src","images/"+bigtype+"")
	$(".userpic .work_title .p1").html(bigtitle)
	$(".userpic .work_title .p2").html(bigsubtitle)

	$(".pic img").load(function(){
			console.log($(this).attr("src"));
			console.log($($(this).parent()).attr('class'));
			//console.log($(this).parent.attr('class'));

			$(this).show();
			$(this).parent().parent().find(".loader").hide();
	});

	$(".pic img").error(function(){
			$(this).parent().parent().hide();

	});

		$.ajax({url:"links.txt",
				type: "GET",
				data: {},
				cached: false,
				dataType: "json",
				success: function(data){
						// console.log(data);
						$(".user .links .facebook").append("<a href='" + data.facebook + "' target='blank'><i class='mdi mdi-facebook-box'></i></a>")
						$(".user .links .website").append("<a href='" + data.website + "' target='blank'><i class='mdi mdi-web'></i></a>")
						$(".user .links .dribbble").append("<a href='" + data.dribbble + "' target='blank'><i class='mdi mdi-dribbble-box'></i></a>")
						$(".user .links .twitter").append("<a href='" + data.twitter + "' target='blank'><i class='mdi mdi-twitter-box'></i></a>")
						$(".user .links .behance").append("<a href='" + data.behance + "' target='blank'><i class='mdi mdi-behance'></i></a>")
						$(".user .links .linkedin").append("<a href='" + data.linkedin + "' target='blank'><i class='mdi mdi-linkedin-box'></i></a>")
					}
				});


})
