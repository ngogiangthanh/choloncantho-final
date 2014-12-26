<?php echo $header; ?>
<!--<?php echo $column_left; ?><?php echo $column_right; ?>-->
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a <?php echo(($breadcrumb == end($breadcrumbs)) ? 'class="last"' : ''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($success) { ?>
<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
<?php } ?>
  <h1><?php echo $heading_title; ?></h1>

  <div class="wishlist-info">
	  <?php if ($products) { ?>
    <table>
      <thead>
        <tr>
          <td class="image"><?php echo $column_image; ?></td>
          <td class="name"><?php echo $column_name; ?></td>
          <td class="model hide_phone"><?php echo $column_model; ?></td>
          <td class="price"><?php echo $column_price; ?></td>
          <td class="stock hide_phone"><?php echo $column_stock; ?></td>
          <td class="remove hide_text hide_phone"><?php echo $button_remove; ?></td>
          <td class="action last"><?php echo $column_action; ?></td>
        </tr>
      </thead>
     
      <tbody id="wishlist-row<?php echo $product['product_id']; ?>">
	   <?php foreach ($products as $product) { ?>
        <tr>
          <td class="image"><?php if ($product['thumb']) { ?>
            <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
            <?php } ?></td>
          <td class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
          <td class="model hide_phone"><?php echo $product['model']; ?></td>
          <td class="price"><?php if ($product['price']) { ?>
            <div class="price">
              <?php if (!$product['special']) { ?>
              <?php echo $product['price']; ?>
              <?php } else { ?>
              <s><?php echo $product['price']; ?></s> <b><?php echo $product['special']; ?></b>
              <?php } ?>
            </div>
            <?php } ?></td>
          <td class="stock hide_phone"><?php echo $product['stock']; ?></td>
		  <td class="remove hide_phone"><a href="<?php echo $product['remove']; ?>"><img src="catalog/view/theme/bt_gomarket/image/remove-small.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" /></a></td>
          <td class="action last"><span class="boss_button"><input type="button" value="<?php echo $button_cart; ?>" onclick="boss_addToCart('<?php echo $product['product_id']; ?>');" class="button" />
		  </td>
        </tr>
		<?php } ?>
      </tbody>
     
    </table>
  </div>
  <div class="buttons" style="padding-bottom:20px; overflow:hidden">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons" style=" padding-bottom:20px; overflow:hidden">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?>
  <?php echo $content_bottom; ?></div>

<?php echo $footer; ?>