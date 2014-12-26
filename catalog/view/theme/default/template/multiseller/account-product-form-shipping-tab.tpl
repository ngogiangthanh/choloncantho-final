<table class="ms-shipping">

	<?php if ($shipping_type == MsShipping::SHIPPING_TYPE_FIXED) { ?>
		<p class="attention"> <?php echo $ms_message_fixed_shipping_enabled; ?> <a href="<?php echo $shipping_settings_link; ?>"><?php echo $ms_account_shipping_settings_heading; ?></a>. </p>
	<?php } ?>

	<tr><td colspan="2"><h3><?php echo $ms_product_shipping_dimensions; ?></h3></td></tr>
	
	<tr>
		<td><?php echo $ms_product_shipping_length; ?> x <?php echo $ms_product_shipping_width; ?> x <?php echo $ms_product_shipping_height; ?></td>
		<td>
			<input type="text" class="ms_input_small" name="shipping_length" value="<?php echo $product['length']; ?>" size="8" /> x <input type="text" class="ms_input_small" name="shipping_width" value="<?php echo $product['width']; ?>" size="8" /> x <input type="text" class="ms_input_small" name="shipping_height" value="<?php echo $product['height']; ?>" size="8" />
			<p class="error" id="error_shipping_dimensions"></p>
		</td>
	</tr>
	
	<tr>
		<td><?php echo $ms_product_shipping_length_class; ?></td>
		<td>
			<select name="length_class_id">
			<?php foreach ($length_classes as $length_class) { ?>
				<?php if ($length_class['length_class_id'] == $product['length_class_id']) { ?>
					<option value="<?php echo $length_class['length_class_id']; ?>" selected="selected"><?php echo $length_class['title']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $length_class['length_class_id']; ?>"><?php echo $length_class['title']; ?></option>
				<?php } ?>
			<?php } ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td><?php echo $ms_product_shipping_weight; ?><?php if ($shipping_type == MsShipping::SHIPPING_TYPE_COMBINABLE) { ?><span class="required">*</span><?php } ?></td>
		<td>
			<input type="text" name="shipping_weight" value="<?php echo $product['weight']; ?>" />
			<p class="error" id="error_shipping_weight"></p>
		</td>
	</tr>
	
	<tr>
		<td><?php echo $ms_product_shipping_weight_class; ?></td>
		<td>
			<select name="weight_class_id">
			<?php foreach ($weight_classes as $weight_class) { ?>
				<?php if ($weight_class['weight_class_id'] == $product['weight_class_id']) { ?>
					<option value="<?php echo $weight_class['weight_class_id']; ?>" selected="selected"><?php echo $weight_class['title']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $weight_class['weight_class_id']; ?>"><?php echo $weight_class['title']; ?></option>
				<?php } ?>
			<?php } ?>
			</select>
		</td>
	</tr>
	
	<!-- Continue only if Fixed Shipping Type selected for seller -->
	<?php if ($shipping_type == MsShipping::SHIPPING_TYPE_FIXED) { ?>
	
		<tr>
			<td colspan="2">
				<h3><span class="required">*</span><?php echo $ms_product_shipping_methods; ?></h3>
				<p class="error" id="error_shipping_methods"></p>
			</td>
		</tr>
		
		<!-- Shipping method table -->
		<table id="shipping_method" class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $ms_product_shipping_method_name; ?></td>
					<td class="left"><?php echo $ms_product_shipping_method_comment; ?></td>
					<td class="left"><span class="required">*</span><?php echo $ms_product_shipping_method_cost; ?></td>
					<!--<td class="left"><?php //echo $ms_product_shipping_method_currency; ?></td>-->
					<td class="left"><?php echo $ms_product_shipping_method_geo_zone; ?></td>
					<td class="left"></td>
				</tr>
			</thead>
			<tbody>
			
			<!-- sample row -->
			<tr class="ffSample">
			
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
					<?php echo $currency_left; ?> <input type="text" name="ms_shipping_methods[0][cost]" value="" size="8" /> <?php echo $currency_right; ?>
				</td>
				
				<!--
				<td class="left">
					<select name="ms_shipping_methods[0][currency_id]">
						<?php //foreach ($currencies as $currency) { ?>
							<option value="<?php //echo $currency['currency_id']; ?>"><?php //echo $currency['title']; ?></option>
						<?php //} ?>
					</select>
				</td>
				-->
				
				<td class="left">
					<select name="ms_shipping_methods[0][geo_zone_id]">
						<?php foreach ($geo_zones as $geo_zone) { ?>
							<option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
						<?php } ?>
					</select>
				</td>
				
				<td class="left">
					<a class="button ffRemove"><span><?php echo $ms_product_shipping_method_button_remove; ?></span></a>
				</td>
			</tr>		        
			<!-- /sample row -->
			
			<?php $row = 1; ?>
			<?php if (isset($ms_shipping_methods) && is_array($ms_shipping_methods)) { ?>
			<?php foreach ($ms_shipping_methods as $ms_shipping_method) { ?>
			<tr id="shipping-method-row<?php echo $row; ?>">
			
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
					<?php echo $currency_left; ?> <input type="text" name="ms_shipping_methods[<?php echo $row; ?>][cost]" value="<?php echo $ms_shipping_method['cost']; ?>" size="8" /> <?php echo $currency_right; ?>
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
					<a class="button ffRemove"><span><?php echo $ms_product_shipping_method_button_remove; ?></span></a>
				</td>
				
			</tr>
			<?php $row++; ?>
			<?php } ?>
			<?php } ?>
			</tbody>
			<tfoot>
			  <tr>
				<td colspan="4"></td>
				<td class="left"><a class="button ffClone"><span><?php echo $ms_product_shipping_method_button_add; ?></span></a></td>
			  </tr>
			</tfoot>
		</table>
	
	<?php } ?>
	
</table>

<script type="text/javascript">
	$('body').delegate("a.ffRemove", "click", function() {
		$(this).parents('tr').remove();
	});
</script> 