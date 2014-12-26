<?php if(!empty($modules)){ ?>
<div class="box boss_homecategory_column five columns omega" id="boss_homecategory_column_<?php echo $module; ?>">
	<div class="box-heading"><span><?php echo $modules['name']; ?></span></div>
	<div class="box-content">
		<div class="list_carousel responsive product-grid">
		<?php if(!empty($modules['products'])){ ?>
			<ul id="boss_category_column<?php echo $module; ?>">
			<?php $count=count($modules['products']); 
				for($i=0; $i < $count; $i ++){ ?>
				<li>
				<?php for($j=0; $j<3; $j++){
					if($i < $count){
						$product = $modules['products'][$i];
						?>
						<div <?php if($j==2 || $i == ($count-1)){ echo 'class="last"';} ?>>
						<div class="boss_info">
						<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>				<?php if ($product['price']) { ?>
							<div class="price">
							  <?php if (!$product['special']) { ?>
							  <?php echo $product['price']; ?>
							  <?php } else { ?>
							  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
							  <?php } ?>
							</div>
						<?php } ?>
						</div>
						<?php if ($product['thumb']) { ?>
						<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"/></a></div>
						<?php } ?>
						</div>
					<?php $i++; } 
				} ?>
				</li>
				<?php } ?>
			</ul>
			<a id="prev_catcolumn<?php echo $module; ?>" class="prev" href="#" title="prev">&lt;</a>
			<a id="next_catcolumn<?php echo $module; ?>" class="next" href="#" title="next">&gt;</a>
		<?php } ?>
		</div>
	</div>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript">
$(window).load(function(){
	$('#boss_category_column<?php echo $module; ?>').carouFredSel({
		//auto: false,
		responsive: true,
		width: '100%',
		prev: '#prev_catcolumn<?php echo $module; ?>',
		next: '#next_catcolumn<?php echo $module; ?>',
		swipe: {
		onTouch : true
		},
		items: {
			//width: 200,
			height: 300,
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
	