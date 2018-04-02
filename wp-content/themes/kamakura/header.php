<?php
	$lang = getCurrentLangDefault();
	$slug = getSlugUrl($lang);
	$eventUrl = getUrlSite();//'http://www.kamakura-arts.or.jp/kamakuraart/test/wordpress/event';
	//$id = setIdBody();
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$myarray = explode('/',$actual_link);
	$end = end($myarray);
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=yes" />
<meta name="apple-mobile-web-app-capable" content="yes">

<title>鎌倉アート＆カルチャーMAP</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>common/css/import.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>common/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>common/css/slick-theme.css">

<!--[if gte IE 9]><!-->
<script src="<?php echo JS_PATH ?>common/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo JS_PATH ?>common/js/print.js"></script>
<!--<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo JS_PATH ?>common/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo JS_PATH ?>common/js/html5shiv-printshiv.min.js"></script>
<script src="<?php echo JS_PATH ?>common/js/selectivizr-min.js"></script>
<![endif]-->
<script src="<?php echo JS_PATH ?>common/js/slick.min.js"></script>

<script src="<?php echo JS_PATH ?>common/js/common.js"></script>
</head>
<body id="<?= setIdBody() ?>">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101164171-1', 'auto');
  ga('send', 'pageview');

</script>
<script type='text/javascript'>
    function printPdf() {
      printJS('<?php echo IMAGE_PATH ?>common/images/top/kamakura_map201702.pdf');
    }
  </script>
<div id="wrapper">

<script src="https://apis.google.com/js/client.js"></script>
<script>
	var domain = '<?= getUrlSite() ?>';
	domain = domain.replace('/en','');
	function getCalendar(target,dom,start,end) {
		var targets = target || "";
		var domdom = dom || ".calendarEvents";
		var que = "";
		if(targets != ""){
			que = "&target="+targets;
		}
		var startTime = new Date(start).getTime() || new Date().getTime();
		var endTime = new Date(end).getTime() || new Date().getTime()+86400;86400
		startTime = Math.floor(startTime/1000);
		endTime = Math.floor(endTime/1000);
		var url= domain+"/wp-content/themes/kamakura/calendar.php?start="+startTime+"&end="+endTime+que;
		var jsons;
		var cnt = 0;

		$.get(url, function (json) {
		jsons = JSON.parse(json); 
			console.log(jsons);
			if(jsons.items.length > 0){
			$.each(jsons.items,function(key,val){
				console.log(val);

				if(val.summary != ''){
					cnt = 1;
					var start = formatDate(new Date(val.start.dateTime), 'hh:mm');
					var end = formatDate(new Date(val.end.dateTime), 'hh:mm');
					$(domdom).append("<span class='open'>"+val.summary+"</span>");
					// $(domdom).append("<span class='open'>本日開館&nbsp;&nbsp;"+start+" ~ "+end+"</span>");
				}else{
					// $(".calendarEvents").append("<p class='eventNone'>本日休館</p>");
				}
			});
			if(cnt == 0){
					$(domdom).append("<span class='close'><?php _e('本日休館','kamakura') ?></span>");
				}
			}else{
				$(domdom).append("<span class='close'><?php _e('本日休館','kamakura') ?></span>");
			}
		});

}
$(function(){
	getCalendar("p2rj7c8goi8nd5no60fag0gr58@group.calendar.google.com","#musium01");//北鎌倉葉祥明美術館
	getCalendar("b7i0gg2eoa0uvdb7hpuvfsqmeo@group.calendar.google.com","#musium02");//神奈川県立近代美術館 鎌倉別館
	getCalendar("mld5d42idn8qqlq0a174v4b8m8@group.calendar.google.com","#musium03");//鎌倉国宝館
	getCalendar("rf461sn0o4q3eupcthdl7luoro@group.calendar.google.com","#musium04");//鎌倉市川喜多映画記念館
	getCalendar("49r2a1g7a4292hv2p9pn2ctti8@group.calendar.google.com","#musium05");//鎌倉市鏑木清方記念美術館
	getCalendar("514mr3eosipn2cg27rcenf5v34@group.calendar.google.com","#musium06");//鎌倉彫資料館
	getCalendar("li426cmcrjr1ash9ol5512ok6c@group.calendar.google.com","#musium07");//鎌倉歴史文化交流館
	getCalendar("91aitfq6h69385r04v65h0o0rc@group.calendar.google.com","#musium08");//鎌倉文学館
	getCalendar("9v8839qqgf5h4ss2e2g7fpg4so@group.calendar.google.com","#musium09");//観音ミュージアム
});

var formatDate = function (date, format) {
  if (!format) format = 'YYYY-MM-DD hh:mm:ss.SSS';
  format = format.replace(/YYYY/g, date.getFullYear());
  format = format.replace(/MM/g, ('0' + (date.getMonth() + 1)).slice(-2));
  format = format.replace(/DD/g, ('0' + date.getDate()).slice(-2));
  format = format.replace(/hh/g, ('0' + date.getHours()).slice(-2));
  format = format.replace(/mm/g, ('0' + date.getMinutes()).slice(-2));
  format = format.replace(/ss/g, ('0' + date.getSeconds()).slice(-2));
  if (format.match(/S/g)) {
    var milliSeconds = ('00' + date.getMilliseconds()).slice(-3);
    var length = format.match(/S/g).length;
    for (var i = 0; i < length; i++) format = format.replace(/S/, milliSeconds.substring(i, i + 1));
  }
  return format;
};
</script>
<!-- //▼HEADER▼// -->
<header>
	<article class="inner clearfix">
		
		<?php if ($slug == '/en/') { ?>
		<p><img src="<?php echo IMAGE_PATH ?>common/img/head_fukidashi_en.png" alt="学芸員がススめる!!"></p>
		<h1><a href="<?= $eventUrl ?>/en/"><img src="<?php echo IMAGE_PATH ?>common/img/main_title_en.png" alt="鎌倉アート＆カルチャーMAP" width="709" height="104" class="over"></a></h1>
		<?php } else{ ?>
		<p><img src="<?php echo IMAGE_PATH ?>common/img/head_fukidashi.png" alt="学芸員がススめる!!" width="340" height="127"></p>
		<h1><a href="<?= $eventUrl ?>"><img src="<?php echo IMAGE_PATH ?>common/img/main_title.png" alt="鎌倉アート＆カルチャーMAP" width="709" height="104" class="over"></a></h1>
		<?php } ?>
		<div id="spMenu"><a href="javascript:void(0)" onClick="return false;"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu.png" alt="MENU" width="106" height="48"></a></div>
		<div class="clearfix w768"></div>
		<?php 
		if ($end == "?a=course") { ?>
			<div class="lang">
				<?php 
					$i = 0;
					$languages = pll_the_languages(array('raw' => 1));
					foreach ($languages as $the_lang) {
						$i++;
						if ($the_lang['current_lang']) {
				?>
				<a href="#" class="<?= $the_lang['slug'] ?> active"><img src="<?php echo IMAGE_PATH ?>common/img/<?= $the_lang['slug'] ?>.png" alt=""></a>
				<?php
						} else {
				?>
				<a href="<?= $the_lang['url'] ?>?a=course" class="<?= $the_lang['slug'] ?>"><img src="<?php echo IMAGE_PATH ?>common/img/<?= $the_lang['slug'] ?>.png" alt=""></a>
				<?php
						}
						if ($i < sizeof($languages)) {
				?>
				<span class="dev"><img src="<?php echo IMAGE_PATH ?>common/img/dev.png" alt=""></span>
				<?php
						}
					}
				?>
			</div>
		<?php } else { ?>
			<div class="lang">
				<?php 
					$i = 0;
					$languages = pll_the_languages(array('raw' => 1));
					foreach ($languages as $the_lang) {
						$i++;
						if ($the_lang['current_lang']) {
				?>
				<a href="#" class="<?= $the_lang['slug'] ?> active"><img src="<?php echo IMAGE_PATH ?>common/img/<?= $the_lang['slug'] ?>.png" alt=""></a>
				<?php
						} else {
				?>
				<a href="<?= $the_lang['url'] ?>" class="<?= $the_lang['slug'] ?>"><img src="<?php echo IMAGE_PATH ?>common/img/<?= $the_lang['slug'] ?>.png" alt=""></a>
				<?php
						}
						if ($i < sizeof($languages)) {
				?>
				<span class="dev"><img src="<?php echo IMAGE_PATH ?>common/img/dev.png" alt=""></span>
				<?php
						}
					}
				?>
			</div>
		<?php } ?>
	</article>
</header>
<?php
	$pageActive = setPage();
?>
<?php if ($slug == '/en/') { ?>
	<nav id="spGnavi">
		<ul class="inner clearfix">
			<li><a href="<?= $eventUrl ?>/en/"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_01_en.png" class="over" alt="ホーム"></a></li>
			<li><a href="<?= $eventUrl ?>/en/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_06_en.png" class="over" alt="おすすめモデルコースA  ミュージアム巡り"></a></li>
			<li><a href="<?= $eventUrl ?>/en/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_07_en.png" class="over" alt="おすすめモデルコースB  文化財巡り"></a></li>
			<li><a href="<?= $eventUrl ?>/en/#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_04_en.png" class="over" alt="マップ"></a></li>
			<li><a href="<?= $eventUrl ?>/en/schedule_en"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_05_en.png" class="over" alt="スケジュール"></a></li>
		</ul>
	</nav>
	<!-- //△HEADER△// -->
	<!-- //▼GLOBAL-NAVI▼// -->
	<nav id="gnavi">
		<ul class="inner clearfix">
			<li><a href="<?= $eventUrl ?>/en/"><img src="<?php echo IMAGE_PATH ?>common/img/gn_01sp1_en.png" class="over" alt="ホーム"></a></li>
			<?php if($pageActive == 'course'){ ?>
				<li><a href="<?= $eventUrl ?>/en/course"><img src="<?php echo IMAGE_PATH ?>common/img/gn_02_en_active.png" width="237" height="62" class="over" alt="おすすめモデルコース"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/en/course"><img src="<?php echo IMAGE_PATH ?>common/img/gn_02_en.png" width="237" height="62" class="over" alt="おすすめモデルコース"></a></li>
			<?php } if($pageActive == 'event'){ ?>
				<li><a href="<?= $eventUrl ?>/en/event"><img src="<?php echo IMAGE_PATH ?>common/img/gn_03sp1_en_active.png" class="over" alt="美術館紹介"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/en/event"><img src="<?php echo IMAGE_PATH ?>common/img/gn_03sp1_en.png" class="over" alt="美術館紹介"></a></li>
			<?php } ?>
			<li><a href="<?= $eventUrl ?>/en/#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/gn_04sp1_en.png" class="over" alt="マップ"></a></li>
			<?php if($pageActive == 'schedule'){ ?>
				<li><a href="<?= $eventUrl ?>/en/schedule_en"><img src="<?php echo IMAGE_PATH ?>common/img/gn_05sp1_en_active.png" class="over" alt="スケジュール"></a></li>
			<?php } else{ ?>
				<li><a href="<?= $eventUrl ?>/en/schedule_en"><img src="<?php echo IMAGE_PATH ?>common/img/gn_05sp1_en.png" class="over" alt="スケジュール"></a></li>
			<?php } ?>
		</ul>
	</nav>
	<nav id="" class="w640 gnavi1">
		<ul class="clearfix">
			<?php if($pageActive == 'course'){ ?>
				<li><a href="<?= $eventUrl ?>/en/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_1_en_active.png" alt="" width="100%"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/en/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_1_en.png" alt="" width="100%"></a></li>
			<?php } if($pageActive == 'event'){ ?>
				<li><a href="<?= $eventUrl ?>/en/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_2_en_active.png" alt="" width="100%"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/en/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_2_en.png" alt="" width="100%"></a></li>
			<?php } ?>
			<li><a href="<?= $eventUrl ?>/en/#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_3_en.png" alt="" width="100%"></a></li>
			<?php if($pageActive == 'schedule'){ ?>
				<li><a href="<?= $eventUrl ?>/en/schedule_en"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_4_en_active.png" alt="" width="100%"></a></li>
			<?php } else{ ?>
				<li><a href="<?= $eventUrl ?>/en/schedule_en"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_4_en.png" alt="" width="100%"></a></li>
			<?php } ?>

		</ul>
	</nav>
<?php } else { ?>
	<nav id="spGnavi">
		<ul class="inner clearfix">
			<li><a href="<?= $eventUrl ?>"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_01.png" class="over" alt="ホーム"></a></li>
			<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_06.png" class="over" alt="おすすめモデルコースA  ミュージアム巡り"></a></li>
			<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_07.png" class="over" alt="おすすめモデルコースB  文化財巡り"></a></li>
			<li><a href="<?= $eventUrl ?>#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_04.png" class="over" alt="マップ"></a></li>
			<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/sp_gn_05.png" class="over" alt="スケジュール"></a></li>
		</ul>
	</nav>
	<!-- //△HEADER△// -->
	<!-- //▼GLOBAL-NAVI▼// -->
	<nav id="gnavi">
		<ul class="inner clearfix">
			<li><a href="<?= $eventUrl ?>"><img src="<?php echo IMAGE_PATH ?>common/img/gn_01sp1.png" class="over" alt="ホーム"></a></li>
			<?php if($pageActive == 'course'){ ?>
				<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/gn_02_active.png" width="237" height="62" class="over" alt="おすすめモデルコース"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/gn_02.png" width="237" height="62" class="over" alt="おすすめモデルコース"></a></li>
			<?php } if($pageActive == 'event'){ ?>
				<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/gn_03sp1_active.png" class="over" alt="美術館紹介"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/gn_03sp1.png" class="over" alt="美術館紹介"></a></li>
			<?php } ?>
			<li><a href="<?= $eventUrl ?>#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/gn_04sp1.png" class="over" alt="マップ"></a></li>
			<?php if($pageActive == 'schedule'){ ?>
				<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/gn_05sp1_active.png" class="over" alt="スケジュール"></a></li>
			<?php } else{ ?>
				<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/gn_05sp1.png" class="over" alt="スケジュール"></a></li>
			<?php } ?>
		</ul>
	</nav>
	<nav id="" class="w640 gnavi1">
		<ul class="clearfix">
			<?php if($pageActive == 'course'){ ?>
				<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_1_active.png" alt="" width="100%"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_1.png" alt="" width="100%"></a></li>
			<?php } if($pageActive == 'event'){ ?>
				<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_2_active.png" alt="" width="100%"></a></li>
			<?php }else{ ?>
				<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_2.png" alt="" width="100%"></a></li>
			<?php } ?>
			<li><a href="<?= $eventUrl ?>#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_3.png" alt="" width="100%"></a></li>
			<?php if($pageActive == 'schedule'){ ?>
				<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_4_active.png" alt="" width="100%"></a></li>
			<?php } else{ ?>
				<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_4.png" alt="" width="100%"></a></li>
			<?php } ?>

		</ul>
	</nav>
<?php } ?>
<!-- <nav id="" class="w640 gnavi1">
	<ul class="clearfix">
		<?php if($pageActive == 'course'){ ?>
			<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_1_active.png" alt="" width="100%"></a></li>
		<?php }else{ ?>
			<li><a href="<?= $eventUrl ?>/course"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_1.png" alt="" width="100%"></a></li>
		<?php } if($pageActive == 'event'){ ?>
			<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_2_active.png" alt="" width="100%"></a></li>
		<?php }else{ ?>
			<li><a href="<?= $eventUrl ?>/event"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_2.png" alt="" width="100%"></a></li>
		<?php } ?>
		<li><a href="<?= $eventUrl ?>#topMap"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_3.png" alt="" width="100%"></a></li>
		<?php if($pageActive == 'schedule'){ ?>
			<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_4_active.png" alt="" width="100%"></a></li>
		<?php } else{ ?>
			<li><a href="<?= $eventUrl ?>/schedule"><img src="<?php echo IMAGE_PATH ?>common/img/sp_menu_4.png" alt="" width="100%"></a></li>
		<?php } ?>

	</ul>
</nav> -->