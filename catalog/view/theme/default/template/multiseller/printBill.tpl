<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $language; ?>" xml:lang="<?php echo $language; ?>">
    <head>
        <title><?php echo $bill_title; ?></title>
        <link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/printBill.css" />
        <style type="text/css" media="print">
            #print_button{
                display:none;
            }
        </style>
    </head>
    <body>
        <input type='button' style="height: 30px; width: 120px; font-weight: bold" id='print_button'  value='<?php echo $button_print; ?>' onclick="window.print();"/>
        <div style="page-break-after: always;">
            <h1><?php echo $bill_title;; ?></h1>
            <table class="store" >
                <tr>
                    <!-- <td align="right" valign="top">
                       <?php echo $this->data['order_info']['store_name']; ?><br />
                     </td> -->
                    <td align="left" valign="top" ><table>
                            <tr>
                                <td><b><?php echo $text_date_added; ?></b></td>
                                <td></td>
                                <td><?php echo $this->data['order_info']['date_added']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $text_order_id; ?></b></td>
                                <td></td>
                                <td><?php echo $this->data['order_info']['order_id']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $order_pay_method; ?></b></td>
                                <td></td>
                                <td><?php echo $this->data['order_info']['payment_method']; ?></td>
                            </tr>
                            <?php if ($this->data['order_info']['shipping_method']) { ?>
                            <tr>
                                <td><b><?php echo $text_shipping_method; ?></b></td>
                                <td></td>
                                <td><?php echo $this->data['order_info']['shipping_method']; ?></td>
                            </tr>
                            <?php } ?>
                        </table></td>
                </tr>
            </table>

            <table class="address" > 
                <tr class="heading">
                    <td width="50%"><b><?php echo $text_to; ?></b></td>
                    <td width="50%"><b><?php echo $text_ship_to; ?></b></td>
                </tr>
                <tr>
                    <td><table width="100%">
                            <tr>
                                <td><?php echo '<b>'.$order_name.'</b>'; ?></td>
                                <td><?php echo($this->data['order_info']['payment_lastname'].' '.$this->data['order_info']['payment_firstname']); ?></td>

                            </tr>
                            <tr>
                                <td><b><?php echo $ms_buyeraddress_address; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['payment_address_1'];
                                    echo $this->data['order_info']['payment_address_2'];?>
                                </td>
                            </tr>
                            <tr>
                                <td><b><?php echo $ms_buyeraddress_city; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['payment_city']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $ms_buyeraddress_postcode; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['payment_postcode']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $ms_buyeraddress_zone; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['payment_zone']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $ms_buyeraddress_country; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['payment_country']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $mail_customer; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['email']; ?></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $phone_customer; ?>:</b></td>
                                <td><?php echo $this->data['order_info']['telephone']; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
            </table>
            <table class="product">
                <tr class="heading">
                    <td><b><?php echo $column_product; ?></b></td>
                    <td><b><?php echo $column_model; ?></b></td>
                    <td align="right"><b><?php echo $column_quantity; ?></b></td>
                    <td align="right"><b><?php echo $column_price; ?></b></td>
                    <td align="right"><b><?php echo $column_total; ?></b></td>
                </tr>
                <?php foreach ($this->data['product'] as $product) { ?>
                <tr>
                    <td><?php echo $product['name']; ?>
                        <td><?php echo $product['model']; ?></td>
                        <td align="right"><?php echo $product['quantity']; ?></td>
                        <td align="right"><?php echo $product['price']; if($this->data['order_info']['currency_id'] == 4){ echo " VNĐ";} else {echo " $";} ?></td>
                        <td align="right"><?php echo $product['total']; if($this->data['order_info']['currency_id'] == 4){ echo " VNĐ";} else {echo " $";} ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td align="right" colspan="4"><b><?php echo $text_total; ?></b></td>
                    <td align="right" ><?php echo $this->data['order_info']['total']; if($this->data['order_info']['currency_id'] == 4){ echo " VNĐ";} else {echo " $";} ?></td>

                </tr>
            </table>
            <?php if ($this->data['order_info']['comment']) { ?>
            <table class="comment">
                <tr class="heading">
                    <td><b><?php echo $column_comment; ?></b></td>
                </tr>
                <tr>
                    <td><?php echo $this->data['order_info']['comment']; ?></td>
                </tr>
            </table>
            <?php } ?>
        </div>

    </body>
</html>