<?php 
	$slug = getSlugUrl($lang);
?>

<div id="sec1">
	<?php if ($slug == '/en/') { ?>
    	<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/sec1_h2_en.png" alt=""></h2>
    <?php }else{ ?>
		<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/sec1_h2.png" alt=""></h2>
    <?php } ?>
    <p class="text">
        <?= _e('鎌倉には様々なミュージアムがあり、鎌倉の文化をそれぞれの専門を活かし発信しています。このサイトでは鎌倉のミュージアムの学芸員たちが、アート・文化財・建築・文学の４つのテーマで、ちょっとマニアックな鎌倉をご案内します。何度も訪れた場所にも新たな発見があるかも！？さあ、ひと味違う鎌倉旅に出かけませんか。', 'kamakura') ?>
    </p>
</div>