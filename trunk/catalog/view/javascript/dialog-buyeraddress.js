$(function() {
	$('.ms-buyeraddress').live('click', function() {
		var url = this.href;
		var title = this.title;
		var dialog = $("#ms-buyeraddress-dialog-div");
		//if ($("#ms-buyeraddress-dialog-div").length == 0) {
			dialog = $('<div id="ms-buyeraddress-dialog-div" style="display:hidden"></div>').appendTo('body');
			dialog.load(
					url,
					{},
					function(responseText, textStatus, XMLHttpRequest) {
						dialog.dialog({
							autoOpen: true,
							height: 260,
							width: 380,
							resizable: false,
							draggable: false,
							modal: true,
							title: title,
							dialogClass: 'ms-buyeraddress-dialog ms-jquery-dialog',
							buttons: {
								"OK": function() {
									dialog.dialog("close");
								}
							},
							close: function (event, ui) {
								dialog.dialog("destroy");
							}
						});
					}
				);
		/*} else {
			dialog.dialog("open");
		}*/
		return false;
	});
});
