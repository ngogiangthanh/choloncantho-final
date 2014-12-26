<?php
//-----------------------------------------------------
// TagCloud for Opencart v1.5.3    
// Created by villagedefrance                          
// contact@villagedefrance.net                                    
//-----------------------------------------------------
?>

<?php if($box) { ?>
	<div class="box boss_tag">
		<div class="box-heading"><span>
			<?php if($icon) { ?>	
				<div style="float: left; margin-right: 8px;"><img src="catalog/view/theme/default/image/cloud.png" alt="" /></div>
			<?php } ?>
			<?php if($title) { ?>	
				<?php echo $title; ?>
			<?php } ?></span>
		</div>
		
		<div class="box-content"> 
			<?php if($tagcloud) { ?>
				<?php echo $tagcloud; ?>
			<?php } else { ?>
				<?php echo $text_notags; ?>
			<?php } ?>
		</div>
	</div>
	
<?php } else { ?>
	
	<div style="text-align:center; margin-bottom:10px;">
		<?php if($tagcloud) { ?>
			<?php echo $tagcloud; ?>
		<?php } else { ?>
			<?php echo $text_notags; ?>
		<?php } ?>
	</div>
	
<?php } ?>