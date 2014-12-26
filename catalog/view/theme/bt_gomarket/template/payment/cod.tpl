<div class="buttons">
  <div class="right">
    <span class=""><input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button-checkout" /></span>
  </div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
	$.ajax({ 
		type: 'get',
		url: 'index.php?route=payment/cod/confirm',
		success: function() {
			location = '<?php echo $continue; ?>';
		}		
	});
});
//--></script> 
