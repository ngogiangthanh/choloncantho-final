$(function() {
	if ($("input[name='product_enable_shipping']:checked").val() == 0) {
		$('#shipping_tab').hide();
	}

	$("input[name='product_enable_shipping']").live('change', function() {
		if ($(this).val() == 1) {
			$('#shipping_tab').show();
		} else {
			$('#shipping_tab').hide();
		}
	});
});
