<?php if(!empty($modules)){ ?>
<div class="box boss_homecategory_nonetab fourteen columns " id="box_homecategory_nonetab_<?php echo $module; ?>">
	<div class="box-heading"><span><?php echo $modules['name']; ?></span></div>
	<div class="box-content">
		<div class="list_carousel responsive">
			<ul id="boss_nonetab_banner<?php echo $module; ?>">
			<?php foreach ($modules['banners'] as $banner) { ?>
			<?php if ($banner['link']) { ?>
			<li><a href="<?php echo $banner['link']; ?>"><img alt="<?php echo $banner['title']; ?>" src="<?php echo $banner['image']; ?>" title="<?php echo $banner['title']; ?>" /></a></li>
			<?php } else { ?>
			<li><img alt="<?php echo $banner['title']; ?>" src="<?php echo $banner['image']; ?>" title="<?php echo $banner['title']; ?>" /></li>
			<?php } ?>
			<?php } ?>
			</ul>
			<a id="prev_nonetab<?php echo $module; ?>" class="prev" href="#" title="prev">&lt;</a>
			<a id="next_nonetab<?php echo $module; ?>" class="next" href="#" title="next">&gt;</a>
		</div>
		<div class="box-product  product-grid">
		<?php if(!empty($modules['products'])){ ?>
			<ul>
			<?php foreach ($modules['products'] as $product) { ?>
			<li>
				<?php if ($product['thumb']) { ?>
				<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"/></a></div>
				<?php } ?>
				<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
			</li>
			<?php } ?>
			</ul>
		<?php } ?>
		</div>
	</div>

<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript">
$(window).load(function(){
	$('#boss_nonetab_banner<?php echo $module; ?>').carouFredSel({
		//auto: false,
		responsive: true,
		width: '100%',
		prev: '#prev_nonetab<?php echo $module; ?>',
		next: '#next_nonetab<?php echo $module; ?>',
		swipe: {
		onTouch : true
		},
		items: {
			//width: 200,
			height: 280,
			visible: {
			min: 1,
			max: 1
			}
		},
		scroll: {
			direction : 'left',    //  The direction of the transition.
			duration  : 900   //  The duration of the transition.
		}
	});
});
</script>
</div>
<?php } ?>
	