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
	<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/badge.png" alt="" /> <?php echo $heading; ?></h1>
			<div class="buttons">
				<a onclick="location = '<?php echo $insert; ?>'" class="button"><?php echo $button_insert; ?></a>
				<a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a>
			</div>
		</div>
		<div class="content">
		<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
			<table class="list" style="text-align: center" id="list-badges">
			<thead>
				<tr>
					<td class="tiny"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
					<td class="tiny"><?php echo $ms_badges_column_id; ?></td>
					<td class="large"><?php echo $ms_badges_column_name; ?></td>
					<td><?php echo $ms_description; ?></td>
					<td class="medium"><?php echo $ms_badges_image; ?></td>
					<td class="medium"><?php echo $ms_badges_column_action; ?></td>
				</tr>
				
				<tr class="filter">
					<td></td>
					<td><input type="text"/></td>
					<td><input type="text"/></td>
					<td><input type="text"/></td>
					<td></td>
					<td></td>
				</tr>
			</thead>
			<tbody></tbody>
			</table>
		</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	$('#list-badges').dataTable( {
		"sAjaxSource": "index.php?route=multiseller/badge/getTableData&token=<?php echo $token; ?>",
		"aoColumns": [
			{ "mData": "checkbox", "bSortable": false },
			{ "mData": "id" },
			{ "mData": "name" },
			{ "mData": "description" },
			{ "mData": "image", "bSortable": false },
			{ "mData": "actions", "bSortable": false, "sClass": "right" }
		],
	});
});
</script>

<?php echo $footer; ?> 