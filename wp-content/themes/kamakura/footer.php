<?php 
	$current_lang = getCurrentLangDefault();
	$eventUrl = getUrlSite();
?>
<!-- //▼FOOTER▼// -->
<footer id="footer">
	<div id="footWrap">
		<div id="footCont">
			<article class="inner clearfix">
				<div class="w70">
					<dl id="footLogo" class="clearfix">
						<?php if ($current_lang == 'en') { ?>
							<dt><a href="<?= $eventUrl ?>"><img src="<?php echo IMAGE_PATH ?>common/img/foot_logo_en.png" alt="鎌倉アート＆カルチャーMAP" class="over" width="100%"></a></dt>
						<?php }else{ ?>
							<dt><a href="<?= $eventUrl ?>"><img src="<?php echo IMAGE_PATH ?>common/img/foot_logo.png" alt="鎌倉アート＆カルチャーMAP" class="over" width="100%"></a></dt>
						<?php } ?>
						<dd><?php _e('平成28年　文化庁　地域の核となる美術館・歴史博物館支援事業<br>平成29年度　美術館・歴史博物館重点分野推進支援事業<br>
© Copyright by Executive Committee, Project to Facilitate Access to Museums in Kamakura for Foreign Visitors 2016, 2017 all rights reserved.<br>
Supported by the Agency for Cultural Affairs Government of Japan fiscal in the 2016, 2017','kamakura') ?></dd>
					</dl>
					<div id="footBunka1"><img src="<?php echo IMAGE_PATH ?>common/img/logo_bunka.jpg" alt="文化庁" class="over"></div>
					<dl class="footInfo">
						<dt><span><?php _e('企画・制作','kamakura') ?></span></dt>
						<dd><?php _e('鎌倉の美術館　外国人利用のための環境整備事業実行委員会（鎌倉市鏑木清方記念美術館・北鎌倉 葉祥明美術館・鎌倉文学館）','kamakura') ?></dd>
					</dl>
					<dl class="footInfo">
						<dt><span><?php _e('お問い合わせ','kamakura') ?></span></dt>
						<dd><?php _e('鎌倉の美術館　外国人利用のための環境整備事業実行委員会<br>〔事務局〕〒248-0005 鎌倉市雪ノ下１−５−２５ 鎌倉市鏑木清方記念美術館内<br>〔TEL〕0467-23-6405〔FAX〕0467-23-6407<br/>〔Email] kaburaki-museum@kamakura-arts.or.jp','kamakura') ?></dd>
					</dl>
				</div>
				<div class="w30">
					<p id="footBunka"><a href="http://www.bunka.go.jp/" target="_blank"><img src="<?php echo IMAGE_PATH ?>common/img/logo_bunka.jpg" alt="文化庁" class="over"></a></p>
				</div>
			</article>
		</div>
	</div>
</footer>
<!-- //△FOOTER△// -->



</div><!-- End of wrapper -->
<script>
	$(document).ready(function(){
		$('.enlarge_map').click(function(){
			$('#scale_map').addClass('scale');
			$('.ova').css('overflow','auto');
		});
	});
</script>
<script src="<?php echo JS_PATH ?>common/js/heightLine.js"></script>
<script src="<?php echo JS_PATH ?>common/js/scrolltopcontrol.js"></script>
<script src="<?php echo JS_PATH ?>common/js/jquery.bxslider.js"></script>
</body>
</html>