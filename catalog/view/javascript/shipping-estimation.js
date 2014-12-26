$(function() {
	$(document).delegate('#button_get_rates:not(.disabled)', 'click', function() {
		/*$.ajax({
			type: "POST",
			dataType: "json",
			url: 'index.php?route=module/ms-shipping-estimation/getRates&product_id='+shipping_estimate_product_id,
			data: "",
			beforeSend: function() {
				$('#button_get_rates').addClass('disabled');
				$('#button_get_rates').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /></div>');
			},		
			complete: function() {
				$('#button_get_rates').removeClass('disabled');
			},
			success: function(jsonData) {
				if ($.isEmptyObject(jsonData.errors)) {
					$('#comment-title').after('<div class="success">' + jsonData.success + '</div>');
					$('#tab-comments input[type="text"]:not(:disabled), #tab-comments textarea:not(:disabled)').val('');*/
					$('#tab-shipping-estimation .shipping_methods').load('index.php?route=module/ms-shipping-estimate/getRates&product_id=' + shipping_estimate_product_id + '&geo_zone_id=' + $('#shipping_geo_zone').val() + '&quantity=' + $('[name="quantity"]').val());
				/*}
			}
		});*/
	});
	
});