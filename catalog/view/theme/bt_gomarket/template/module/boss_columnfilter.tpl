<div class="clear"></div>
<div class="box boss_column_filter five columns alpha boss_bestseller" id="box_column_filter_<?php echo $module; ?>">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content">
	<div class="list_carousel responsive product-grid">
		<?php if(!empty($products)){?>
		<?php if ($image) { ?>
		<div class="boss_label"><img src="<?php echo $image; ?>" alt="image" /></div>
		<?php } ?>
		<ul id="boss_column_filter<?php echo $module; ?>">
		  <?php foreach ($products as $product) { ?>
			<li>  
				<?php if ($product['thumb']) { ?>
				<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
				<?php } ?>
				<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
				<div class="description"><?php echo $product['description']; ?></div>
				<div class="viewmore"><a href="<?php echo $product['href']; ?>"><?php echo $view_more; ?></a></div>
			</li>
		  <?php } ?>
		</ul>
		<a id="prevcolumnfilter<?php echo $module; ?>" class="prev" href="#" title="prev">&lt;</a>
		<a id="nextcolumnfilter<?php echo $module; ?>" class="next" href="#" title="next">&gt;</a>
		<?php } ?>
	</div>
  </div>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript">
$(window).load(function(){
	$('#boss_column_filter<?php echo $module; ?>').carouFredSel({
		responsive: true,
		//auto: false,
		responsive: true,
		width: '100%',
		prev: '#prevcolumnfilter<?php echo $module; ?>',
		next: '#nextcolumnfilter<?php echo $module; ?>',
		swipe: {
		onTouch : true
		},
		items: {
		//	width: 200,
		//	height: 33,
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

