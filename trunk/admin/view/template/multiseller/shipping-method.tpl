<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($error_shipping) { ?>
		<div class="warning"><?php echo $error_shipping; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading; ?></h1>
			<div class="buttons">
				<a onclick="location = '<?php echo $insert; ?>'" class="button"><?php echo $button_insert; ?></a>
				<a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a>
			</div>
		</div>
		<div class="content">
		<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
			<table class="list">
			<thead>
				<tr>
					<td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
					<td style="width: 40px"><?php echo $ms_shipping_methods_column_id; ?></td>
					<td><?php echo $ms_shipping_methods_column_name; ?></td>
					<td style="text-align: center; width: 80px"><?php echo $ms_shipping_methods_column_action; ?></td>
				</tr>
			</thead>
			<tbody>
				<?php if ($shipping_methods) { ?>
				<?php foreach ($shipping_methods as $shipping_method) { ?>
				<tr>
					<td style="text-align: center;"><?php if ($shipping_method['selected']) { ?>
						<input type="checkbox" name="selected[]" value="<?php echo $shipping_method['shipping_method_id']; ?>" checked="checked" />
						<?php } else { ?>
						<input type="checkbox" name="selected[]" value="<?php echo $shipping_method['shipping_method_id']; ?>" />
						<?php } ?></td>
					<td><?php echo $shipping_method['shipping_method_id']; ?></td>
					<td><?php echo $shipping_method['name']; ?></td>
					<td style="text-align: center">
						<a class="ms-button ms-button-edit" href="<?php echo $this->url->link('multiseller/shipping-method/update', 'token=' . $this->session->data['token'] . '&shipping_method_id=' . $shipping_method['shipping_method_id'], 'SSL'); ?>" title="<?php echo $text_edit; ?>"></a>
						<a class="ms-button ms-button-delete" href="<?php echo $this->url->link('multiseller/shipping-method/delete', 'token=' . $this->session->data['token'] . '&shipping_method_id=' . $shipping_method['shipping_method_id'], 'SSL'); ?>" title="<?php echo $button_delete; ?>"></a>
					</td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td class="center" colspan="4"><?php echo $text_no_results; ?></td>
				</tr>
				<?php } ?>
			</tbody>
			</table>
		</form>
		<div class="pagination"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>
<?php echo $footer; ?> 