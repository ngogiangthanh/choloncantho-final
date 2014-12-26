<div id="cart" class="five columns omega">
  <div class="heading">  
    <a><span id="cart-total"><?php echo $text_items; ?></span></a></div>
  <div class="content">
    <?php if ($products || $vouchers) { ?>
    <div class="mini-cart-info">
      <table>
        <?php foreach ($products as $product) { ?>
        <tr>
          <td class="image"><?php if ($product['thumb']) { ?>
            <div class="boss_image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" />			
			</a>
			<span class="remove"><img src="catalog/view/theme/bt_gomarket/image/remove-small.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" onclick="(getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') ? location = 'index.php?route=checkout/&amp;remove=<?php echo $product['key']; ?>' : $('#cart').load('index.php?route=module/&amp;remove=<?php echo $product['key']; ?>' + ' #cart > *');" /></span>
			</div>
            <?php } ?></td>
          <td class="right">
			  <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
			  <div class="quantity">x&nbsp;<?php echo $product['quantity']; ?></div>
			  <div class="total"><?php echo $product['total']; ?></div>
		  </td>
         
          
        </tr>
        <?php } ?>
        <?php foreach ($vouchers as $voucher) { ?>
        <tr>
          <td class="image"> <div class="boss_image"> <span class="remove"><img src="catalog/view/theme/bt_gomarket/image/remove-small.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" onclick="(getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') ? location = 'index.php?route=checkout/&amp;remove=<?php echo $voucher['key']; ?>' : $('#cart').load('index.php?route=module/&amp;remove=<?php echo $voucher['key']; ?>' + ' #cart > *');" /></span></div></td>
          <td class="right">
			 <div class="name"><?php echo $voucher['description']; ?></div>
			 <div class="quantity">x&nbsp;1</div>
			 <div class="total"><?php echo $voucher['amount']; ?></div>
		  </td>
         
         
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="mini-cart-total">
      <table>
        <?php foreach ($totals as $total) { ?>
        <tr class="<?php echo($total==end($totals) ? 'last' : ''); ?>">
          <td class="left"><b><?php echo $total['title']; ?>:</b></td>
          <td class="right"><?php echo $total['text']; ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="checkout"><a class="boss_button_color boss_button_blue " href="<?php echo $cart; ?>"><span><?php echo $text_cart; ?></span></a><a class="boss_button_color boss_button_black" href="<?php echo $checkout; ?>"><span><?php echo $text_checkout; ?></span></a></div>
    <?php } else { ?>
    <div class="empty"><?php echo $text_empty; ?></div>
    <?php } ?>
  </div>
</div>

<script type="text/javascript"><!--
$(document).ready(function() {
	if(getWidthBrowser() < 959) {
		$('#cart > .heading a').live('click', function() {
			if($('#cart').hasClass('my-active')){
				$('#cart').removeClass('active');
				$('#cart').removeClass('my-active');
			} else {
				$('#cart').addClass('my-active');
			}
		});
	}
});
--></script>