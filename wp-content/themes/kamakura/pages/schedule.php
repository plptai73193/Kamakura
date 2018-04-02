<?php
$lang = getCurrentLangDefault();
/* Template Name: Schedule */
get_header(); 
?>
<div id="container">
	<article class="inner">
		<!-- //▼SCHEDULE▼// -->
		<div id="scheduleWrap">
			<div id="scheduleCont" class="clearfix">
				<!--****-->
					<?php if ($lang == 'en') { ?>
						<h1><img src="<?php echo IMAGE_PATH ?>common/images/schedule/ttl_schedule_en.png" alt="美術館 開館スケジュール"></h1>
					<?php } else { ?>
						<h1><img src="<?php echo IMAGE_PATH ?>common/images/schedule/ttl_schedule.png" alt="美術館 開館スケジュール"></h1>
					<?php } ?>
					<!--**-->
					<div id="scheduleBoxWrap">
						<div id="scheduleBox">
							<div id="scheduleInner">
								<div id="gCalWrap">
									<div id="gCalBox">
										<iframe src="https://calendar.google.com/calendar/embed?height=700&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=kamakura.museum%40gmail.com&amp;color=%23B1440E&amp;src=lmm9op4i04hrk9kvnkuod3ntmo%40group.calendar.google.com&amp;color=%232952A3&amp;src=17bkkuv95b1as5s14ikh1pg2d8%40group.calendar.google.com&amp;color=%232F6309&amp;src=foc038ijt7iu2iq6sns7tagcp0%40group.calendar.google.com&amp;color=%23875509&amp;src=ijiarak5k80vthuv8llgimamok%40group.calendar.google.com&amp;color=%23853104&amp;src=bh2ibvkj8l0nm6hu7lnbpk0868%40group.calendar.google.com&amp;color=%236B3304&amp;src=eman125s3vs0dcptgnakfectlo%40group.calendar.google.com&amp;color=%235229A3" style="border-width:0" width="100%" height="700" frameborder="0" scrolling="no"></iframe>
										<?php if ($lang == 'en') { ?>
										<?php } else {?>
											<p class="alignC tsp40">鎌倉ではたくさんのアートに出会えます。<br>ぜひ、遊びに来てください。</p>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--**-->
				<!--****-->
			</div>
		</div>
		<!-- //△SCHEDULE△// -->
	</article>
</div>
<?php 
    get_footer();
?>