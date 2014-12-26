$(function() {
	$('.ms-markshipped').live('click', function() {
		var url = this.href;
		var title = this.title;
		var dialog = $("#ms-markshipped-dialog-div");
		dialog = $('<div id="ms-markshipped-dialog-div" style="display:hidden"></div>').appendTo('body');
		dialog.load(
			url,
			{},
			function(responseText, textStatus, XMLHttpRequest) {
				dialog.dialog({
					autoOpen: true,
					height: 340,
					width: 340,
					resizable: false,
					draggable: false,
					modal: true,
					title: title,
					dialogClass: 'ms-markshipped-dialog ms-jquery-dialog',
					buttons: {
						"OK": function() {
							$.ajax({
								type: "POST",
								dataType: "json",
								url: 'index.php?route=seller/account-order/jxSubmitMarkShippedDialog',
								data: $("#ms-markshipped-dialog form").serialize(),
								beforeSend: function() {
									$('#ms-markshipped-dialog button').attr('disabled', true);
									$('.ms-markshipped-dialog .ui-dialog-buttonpane').before('<p class="attention" style="clear:both"><img src="catalog/view/theme/default/image/loading.gif" alt="" />Please wait...</div>');
								},
								complete: function() {
									$('#ms-markshipped-dialog button').attr('disabled', true);
									$('.ms-markshipped-dialog .attention').remove();
									dialog.dialog("close");
									location = 'index.php?route=seller/account-order';
								},
								success: function() {
									$('#ms-markshipped-dialog #tracking_number').val('');
									$('#ms-markshipped-dialog textarea').val('');
								}
							});
						},
						"Cancel": function() {
							$('#ms-markshipped-dialog #tracking_number').val('');
							$('#ms-markshipped-dialog textarea').val('');
							dialog.dialog("close");
						}
					},
					close: function (event, ui) {
						dialog.dialog("destroy");
					}
				});
			}
		);
		return false;
	});
});
