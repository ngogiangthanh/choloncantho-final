<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>

<div id="content" class="ms-account-shipping-settings">
	<?php echo $content_top; ?>
	
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>

	<h1><?php echo $ms_account_shipping_settings_heading; ?></h1>

	<?php if (isset($error_warning) && ($error_warning)) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	
	<?php if (isset($success) && ($success)) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>

	<form id="ms-account-shipping-settings" method="post" enctype="multipart/form-data">
		<table class="ms-shipping-settings">
			
			<!-- Shipping Type: Fixed/Combinable -->
			<tr>
				<td><?php echo $ms_account_shipping_settings_type; ?></td>
				<td>
					<input type="radio" name="shipping_type" value="0" <?php if ($shipping_type == MsShipping::SHIPPING_TYPE_FIXED) { ?> checked="checked" <?php } ?>/>
					<?php echo $ms_shipping_type_fixed; ?>
					<input type="radio" name="shipping_type" value="1" <?php if ($shipping_type == MsShipping::SHIPPING_TYPE_COMBINABLE) { ?> checked="checked" <?php } ?>/>
					<?php echo $ms_shipping_type_combinable; ?>
					<p class="ms-note"><?php echo $ms_account_shipping_settings_type_note; ?></p>
				</td>
			</tr>
			
			<!-- Combinable shipping type section -->
			
			<tr name="seller_shipping_method_heading" id="seller_shipping_method_heading">
				<td colspan="2">
					<h3><span class="required">*</span><?php echo $ms_product_shipping_methods; ?></h3>
					<p class="error" id="error_shipping_methods_cost"></p>
					<p class="error" id="error_shipping_methods_weight"></p>
				</td>
			</tr>
			
			<tr name="seller_shipping_method_table" id="seller_shipping_method_table">
				<td colspan="2">
					<!-- Shipping method table -->
					<table id="seller_shipping_method" name="seller_shipping_method" class="list">
						<thead>
							<tr>
								<td class="left"><?php echo $ms_seller_shipping_method_name; ?></td>
								<td class="left"><?php echo $ms_seller_shipping_method_comment; ?></td>
								<td class="left"><?php echo $ms_seller_shipping_method_geo_zone; ?></td>
								<td class="left"><span class="required">*</span><?php echo $ms_seller_shipping_method_weight_step; ?></td>
								<td class="left"><?php echo $ms_seller_shipping_method_weight_unit; ?></td>
								<td class="left"><span class="required">*</span><?php echo $ms_seller_shipping_method_cost_per_unit; ?></td>
								<!--<td class="left"><?php //echo $ms_seller_shipping_method_currency; ?></td>-->
								
								<td class="left"></td>
							</tr>
						</thead>
						<tbody>
						
						<!-- sample row -->
						<tr class="ffSample" name="shipping-method-row">
						
							<td class="left">
								<select name="ms_shipping_methods[0][shipping_method_id]">
									<?php foreach ($shipping_methods as $shipping_method) { ?>
										<option value="<?php echo $shipping_method['shipping_method_id']; ?>"><?php echo $shipping_method['name']; ?></option>
									<?php } ?>
								</select>
							</td>
							
							<td class="left">
								<input type="text" name="ms_shipping_methods[0][comment]" value="" size="25" />
							</td>
							
							<td class="left">
								<select name="ms_shipping_methods[0][geo_zone_id]">
									<?php foreach ($geo_zones as $geo_zone) { ?>
										<option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
									<?php } ?>
								</select>
							</td>
							
							<td class="left">
								<input type="text" name="ms_shipping_methods[0][weight_step]" value="" size="8" />
							</td>
							
							<td class="left">
								<select name="ms_shipping_methods[0][weight_class_id]">
									<?php foreach ($weight_classes as $weight_class) { ?>
										<option value="<?php echo $weight_class['weight_class_id']; ?>"><?php echo $weight_class['title']; ?></option>
									<?php } ?>
								</select>
							</td>
							
							<td class="left">
								<?php echo $currency_left; ?> <input type="text" name="ms_shipping_methods[0][cost_per_unit]" value="" size="8" /> <?php echo $currency_right; ?>
							</td>
							
							<!--<td class="left">
								<select name="ms_shipping_methods[0][currency_id]">
									<?php //foreach ($currencies as $currency) { ?>
										<option value="<?php //echo $currency['currency_id']; ?>"><?php //echo $currency['title']; ?></option>
									<?php //} ?>
								</select>
							</td>-->
							
							<td class="left">
								<a class="button ffRemove"><span><?php echo $ms_product_shipping_method_button_remove; ?></span></a>
							</td>
						</tr>		        
						<!-- /sample row -->
						
						<?php $row = 1; ?>
						<?php if (isset($ms_shipping_methods) && is_array($ms_shipping_methods)) { ?>
						<?php foreach ($ms_shipping_methods as $ms_shipping_method) { ?>
						<tr id="shipping-method-row<?php echo $row; ?>" name="shipping-method-row">
						
							<td class="left">
								<select name="ms_shipping_methods[<?php echo $row; ?>][shipping_method_id]">
									<?php foreach ($shipping_methods as $shipping_method) { ?>
										<?php if ($ms_shipping_method['shipping_method_id'] == $shipping_method['shipping_method_id']) { ?>
											<option value="<?php echo $shipping_method['shipping_method_id']; ?>" selected="selected"><?php echo $shipping_method['name']; ?></option>
										<?php } else { ?>
											<option value="<?php echo $shipping_method['shipping_method_id']; ?>"><?php echo $shipping_method['name']; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
							
							<td class="left">
								<input type="text" name="ms_shipping_methods[<?php echo $row; ?>][comment]" value="<?php echo $ms_shipping_method['comment']; ?>" size="25" />
							</td>
							
							<td class="left">
								<select name="ms_shipping_methods[<?php echo $row; ?>][geo_zone_id]">
									<?php foreach ($geo_zones as $geo_zone) { ?>
										<?php if ($ms_shipping_method['geo_zone_id'] == $geo_zone['geo_zone_id']) { ?>
											<option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
										<?php } else { ?>
											<option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
							
							<td class="left">
								<input type="text" name="ms_shipping_methods[<?php echo $row; ?>][weight_step]" value="<?php echo $ms_shipping_method['weight_step']; ?>" size="8" />
							</td>
							
							<td class="left">
								<select name="ms_shipping_methods[<?php echo $row; ?>][weight_class_id]">
									<?php foreach ($weight_classes as $weight_class) { ?>
										<?php if ($ms_shipping_method['weight_class_id'] == $weight_class['weight_class_id']) { ?>
											<option value="<?php echo $weight_class['weight_class_id']; ?>" selected="selected"><?php echo $weight_class['title']; ?></option>
										<?php } else { ?>
											<option value="<?php echo $weight_class['weight_class_id']; ?>"><?php echo $weight_class['title']; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
							
							<td class="left">
								<?php echo $currency_left; ?> <input type="text" name="ms_shipping_methods[<?php echo $row; ?>][cost_per_unit]" value="<?php echo $ms_shipping_method['cost_per_unit']; ?>" size="8" /> <?php echo $currency_right; ?>
							</td>
							
							<!--<td class="left">
								<select name="ms_shipping_methods[<?php //echo $row; ?>][currency_id]">
									<?php //foreach ($currencies as $currency) { ?>
										<?php //if ($ms_shipping_method['currency_id'] == $currency['currency_id']) { ?>
											<option value="<?php //echo $currency['currency_id']; ?>" selected="selected"><?php //echo $currency['title']; ?></option>
										<?php //} else { ?>
											<option value="<?php //echo $currency['currency_id']; ?>"><?php //echo $currency['title']; ?></option>
										<?php //} ?>
									<?php //} ?>
								</select>
							</td>-->
							
							<td class="left">
								<a class="button ffRemove"><span><?php echo $ms_product_shipping_method_button_remove; ?></span></a>
							</td>
							
						</tr>
						<?php $row++; ?>
						<?php } ?>
						<?php } ?>
						</tbody>
						<tfoot>
						  <tr>
							<td colspan="6"></td>
							<td class="left"><a class="button ffClone"><span><?php echo $ms_product_shipping_method_button_add; ?></span></a></td>
						  </tr>
						</tfoot>
					</table>
					
				</td>
			</tr>
			
		</table>
		
		<div class="buttons">
			<div class="left">
				<a href="<?php echo $back; ?>" class="button">
					<span><?php echo $ms_button_cancel; ?></span>
				</a>
			</div>
			<div class="right">
				<a class="button" id="ms-submit-button">
					<span><?php echo $ms_button_submit; ?></span>
				</a>
			</div>
		</div>
	
	</form>

	<?php echo $content_bottom; ?>
</div>

<?php echo $footer; ?>