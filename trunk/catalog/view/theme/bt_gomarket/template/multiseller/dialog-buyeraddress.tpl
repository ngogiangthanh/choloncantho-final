<form  method="POST" target="" action='index.php?route=seller/account-order/printBill&order_id=<?php echo($this->data["order_info"]["order_id"]);?>' >
    <div id="ms-buyeraddress-dialog" title="<?php echo $ms_buyeraddress_title; ?>">
	<!-- tên -->
        <b><?php echo $ms_buyeraddress_name; ?>:</b>
        <?php echo($this->data['order_info']['payment_lastname'].' '.$this->data['order_info']['payment_firstname']); ?> <br /> 
        
        <!-- công ty -->
	<?php if (!empty($this->data['order_info']['shipping_company']) && $this->data['order_info']['shipping_company'] != "") { ?>
		<b><?php echo $ms_buyeraddress_company; ?>:</b> <?php echo $this->data['order_info']['shipping_company']; ?> <br />
	<?php } ?>
        
        <!-- địa chỉ -->
	<b><?php echo $ms_buyeraddress_address; ?>:</b> <?php echo $this->data['order_info']['payment_address_1']; ?> <br />
	<?php if (!empty($this->data['order_info']['payment_address_2']) && $this->data['order_info']['payment_address_2'] != "") { ?>
		<?php echo $this->data['order_info']['payment_address_2']; ?> <br />
	<?php } ?>
	<b><?php echo $ms_buyeraddress_city; ?>:</b> <?php echo $this->data['order_info']['payment_city']; ?> <br />
	<b><?php echo $ms_buyeraddress_postcode; ?>:</b> <?php echo $this->data['order_info']['payment_postcode']; ?> <br />
	<b><?php echo $ms_buyeraddress_zone; ?>:</b> <?php echo $this->data['order_info']['payment_zone']; ?> <br />
	<b><?php echo $ms_buyeraddress_country; ?>:</b> <?php echo $this->data['order_info']['payment_country']; ?> <br />
    </div>
    <input type="submit" value="In hóa đơn" />
</form>