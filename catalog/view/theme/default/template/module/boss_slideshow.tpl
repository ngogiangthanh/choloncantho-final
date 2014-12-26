 <div class="fluid_container fourteen columns">
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_<?php echo $module; ?>">
        <?php foreach ($images as $image) { ?>
            <div data-src="<?php echo $image['image']; ?>" data-link="<?php echo $image['link']; ?>">
				<?php if($image['description']){ ?>
				<div class="camera_caption fadeFromBottom">
                    <?php echo $image['description']; ?>
                </div>
				<?php } ?>
            </div>
        <?php } ?>
    </div><!-- #camera_wrap_1 -->
</div>

<?php if (file_exists('catalog/view/theme/bt_gomarket/stylesheet/camera.css')) {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/camera.css" media="screen" />';
	} else {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/camera.css" media="screen" />';
	}
?>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.mobile.customized.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/jquery.easing.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/camera.min.js"></script>

<script type="text/javascript">
	jQuery(function(){
		jQuery('#camera_wrap_<?php echo $module; ?>').camera({
			autoAdvance: false,
		    mobileAutoAdvance: false,
            //time: 3000,  
			alignment: 'topLeft',
			height: 'auto',
			//loader: 'bar',
			//pagination: false,
			thumbnails: false
		});
	});
</script>
 
 