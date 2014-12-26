<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading; ?></h1>
			<div class="buttons">
				<a id="ms-submit-button" class="button"><?php echo $button_save; ?></a>
				<a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a>
			</div>
		</div>
		<div class="content">
			<form method="post" enctype="multipart/form-data" id="form">
			<input type="hidden" name="shipping_method[shipping_method_id]" value="<?php echo $shipping_method['shipping_method_id']; ?>" />
		     	<div id="tabs" class="htabs">
		     		<a href="#tab-general"><?php echo $tab_general; ?></a>
		     	</div>
		     	<div id="tab-general">
				<table class="form">
					<tr>
						<td><span class="required">*</span> <?php echo $ms_name; ?></td>
						<td>
						<?php foreach ($languages as $language) { ?>
							<input type="text" name="shipping_method[description][<?php echo $language['language_id']; ?>][name]" value="<?php echo $shipping_method['description'][$language['language_id']]['name']; ?>" />
							<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
							<p class="error" id="error_name_<?php echo $language['language_id']; ?>"></p>
						<?php } ?>
						</td>
					</tr>
					
					<?php foreach ($languages as $language) { ?>
					<tr>
						<td><?php echo $ms_description; ?></td>
						<td>
							<textarea name="shipping_method[description][<?php echo $language['language_id']; ?>][description]" cols="40" rows="5"><?php echo $shipping_method['description'][$language['language_id']]['description']; ?></textarea>
							<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" align="top" />
							<p class="error" id="error_description"></p>
						</td>
					</tr>
					<?php } ?>
					
				</table>
				</div>
				
			</form>
		</div>
	</div>
</div>

<script>
$('#tabs a').tabs();

$("#ms-submit-button").click(function() {
	var id = $(this).attr('id');
    $.ajax({
		type: "POST",
		dataType: "json",
		url: 'index.php?route=multiseller/shipping-method/jxSave&token=<?php echo $token; ?>',
		data: $('#form').serialize(),
		success: function(jsonData) {
			console.log(jsonData);
			if (!jQuery.isEmptyObject(jsonData.errors)) {
				$('#error_'+id).text('');
				for (error in jsonData.errors) {
				    if (!jsonData.errors.hasOwnProperty(error)) {
				        continue;
				    }
				    
				    if ($('#error_'+error).length > 0) {
				    	$('#error_'+error).text(jsonData.errors[error]);
				    } else {
				    	$('#error_'+id).text(jsonData.errors[error]);
				   	}
				    console.log(error + " -> " + jsonData.errors[error]);
				}
				window.scrollTo(0,0);
				$("#ms-submit-button").show();
			} else {
				window.location = 'index.php?route=multiseller/shipping-method&token=<?php echo $token; ?>';
			}
       	}
	});
});
</script>
<?php echo $footer; ?> 