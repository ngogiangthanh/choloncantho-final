<div class="box boss_latest five columns omega">
  <div class="box-heading"><span><?php echo $heading_title; ?></span></div>
  <div class="box-content">
	<div class="list_carousel responsive product-grid">
		<ul id="boss_latest<?php echo $module; ?>">
		  <?php foreach ($products as $product) { ?>
		  <li>
			<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
			<?php if ($product['price']) { ?>
			<div class="price">
			  <?php if (!$product['special']) { ?>
			  <?php echo $product['price']; ?>
			  <?php } else { ?>
			  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
			  <?php } ?>
			</div>
			<?php } ?>
			<?php if ($product['thumb']) { ?>
			<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
			<?php } ?>
		  </li>
		  <?php } ?>
		</ul>
		<a id="prev_latest<?php echo $module; ?>" class="prev" href="#" title="prev">&lt;</a>
		<a id="next_latest<?php echo $module; ?>" class="next" href="#" title="next">&gt;</a>
    </div>
  </div>
</div>

<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript">
$(window).load(function(){
	$('#boss_latest<?php echo $module; ?>').carouFredSel({
		//auto: false,
		responsive: true,
		width: '100%',
		prev: '#prev_latest<?php echo $module; ?>',
		next: '#next_latest<?php echo $module; ?>',
		mousewheel: true,
		swipe: {
			//onMouse: true,
			onTouch : true
		},
		items: {
			//width: 200,
			height: 219,
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