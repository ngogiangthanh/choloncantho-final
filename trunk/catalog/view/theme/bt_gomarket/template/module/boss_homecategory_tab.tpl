<div class="clear"></div>
<?php if(!empty($tabs)){ ?>
<div class="boss_homecategory_tab">
	<div class="htabs" id="boss_homecategory_tabs<?php echo $module; ?>">
		<?php foreach ($tabs as $numTab => $tab) { ?>
		<a href="#categorytab-<?php echo $numTab; ?><?php echo $module; ?>"><span><?php echo $tab['name']; ?></span></a>
		<?php } ?>
	</div>
	<?php foreach ($tabs as $numTab => $tab) { ?>
	<div class="box" id="categorytab-<?php echo $numTab; ?><?php echo $module; ?>">
		<div class="box-content">
			<?php if ($tab['image']) { ?>
			<div class="image_category twelve columns alpha omega"><a href="<?php echo $tab['href']; ?>"><img src="<?php echo $tab['image']; ?>" alt="<?php echo $tab['name']; ?>" title="<?php echo $tab['name']; ?>"/></a></div>
			<?php } ?>
		
			<div class="box-product product-grid twelve columns omega">
			<?php if(!empty($tab['products'])){ ?>
				<ul>
				<?php foreach ($tab['products'] as $product) { ?>
				<li>
					<?php if ($product['thumb']) { ?>
					<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"/></a></div>
					<?php } ?>
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
				</li>
				<?php } ?>
				</ul>
			<?php } ?>
			<div class="name_category"><a href="<?php echo $tab['href']; ?>"><?php echo $tab['name']; ?></a></div> 
			<div class="description_category"><?php echo $tab['title']; ?></div>
			</div> 
			
			
		</div><!-- end div box content -->
	</div>
	<?php } ?>
<script type="text/javascript">	
	$('#boss_homecategory_tabs<?php echo $module; ?> a').tabs();
</script>
</div>
<?php } ?>




