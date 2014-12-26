<div id="ms-markshipped-dialog" title="<?php echo $ms_markshipped_title; ?>">
	<form class="dialog">
		<label for="tracking_number"><?php echo $ms_markshipped_tracking_number; ?></label>
		<input type="text" size="30" name="tracking_number" id="tracking_number" value="<?php echo $tracking_number; ?>"></input>
		<br /> <br />
		
		<label for="comment"><?php echo $ms_markshipped_comment; ?></label>
		<textarea rows="5" cols="30" name="comment" id="comment"><?php echo $comment; ?></textarea>
		
		<input type="hidden" name="initial" value="<?php echo $initial; ?>" />
		
		<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
		<input type="hidden" name="seller_id" value="<?php echo $seller_id; ?>" />
		<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>" />
	</form>
</div>
