<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="nineteen columns omega"><?php echo $content_top; ?>
    <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a <?php echo(($breadcrumb == end($breadcrumbs)) ? 'class="last"' : ''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
 
  <div class="nineteen columns alpha omega product-info codespot-detail">
    <?php if ($thumb || $images) { ?>
    <div class="eight columns alpha left">
      <?php if ($thumb) { ?>
      <div class="image"><a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class="colorbox"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image" /></a></div>
      <?php } ?>
      <?php if ($images) { ?>
	  <div class="list_carousel responsive">
		  <ul id="boss-image-additional">
			<?php foreach ($images as $image) { ?>
			<li><a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" class="colorbox"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
			<?php } ?>
		  </ul>
		<a id="prev_image_additional" class="prev" href="#" title="prev">&lt;</a>
		<a id="next_image_additional" class="next" href="#" title="next">&gt;</a>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
    <div class="eleven columns omega right">
	<?php if (isset($seller) && !empty($seller)) { ?>
		    <div class="ms-sellerprofile description">
				<span><?php echo $ms_catalog_product_sellerinfo; ?></span>
		    	<div class="seller-data">
		    		<div class="avatar-box">
		    			<a style="text-decoration: none" href="<?php echo $seller['href']; ?>"><h2><?php echo $seller['nickname']; ?></h2></a>
		    			<a href="<?php echo $seller['href']; ?>"><img src="<?php echo $seller['thumb']; ?>" /></a>
		    			<div class="ms-badges">
							<?php foreach($seller['badges'] as $badge) { ?>
								<img src="<?php echo $badge['image']; ?>" title="<?php echo $badge['description']; ?>" />
							<?php } ?>
							</div>
		    		</div>
		    		<div class="info-box">
		    			<?php if ($seller['country']) { ?>
			    			<p><b><?php echo $ms_catalog_seller_profile_country; ?></b> <?php echo $seller['country']; ?></p>
			    		<?php } ?>
						
						<?php if ($seller['zone']) { ?>
			    			<p><b><?php echo $ms_catalog_seller_profile_zone; ?></b> <?php echo $seller['zone']; ?></p>
			    		<?php } ?>
		
			    		<?php if ($seller['company']) { ?>
			    			<p><b><?php echo $ms_catalog_seller_profile_company; ?></b> <?php echo $seller['company']; ?></p>
			    		<?php } ?>
			    		
			    		<?php if ($seller['website']) { ?>
			    			<p><b><?php echo $ms_catalog_seller_profile_website; ?></b> <?php echo $seller['website']; ?></p>
			    		<?php } ?>
			    		
			    		<p><b><?php echo $ms_catalog_seller_profile_totalsales; ?></b> <?php echo $seller['total_sales']; ?></p>
			    		<p><b><?php echo $ms_catalog_seller_profile_totalproducts; ?></b> <?php echo $seller['total_products']; ?></p>
						<?php if ((!$this->customer->getId() || ($this->customer->getId() && $this->customer->getId() != $seller['seller_id'])) && ($this->config->get('msconf_enable_private_messaging') == 2 || ($this->config->get('msconf_enable_private_messaging') == 1 && $this->customer->getId()))) { ?>
							<p><a href="index.php?route=seller/catalog-seller/jxRenderContactDialog&product_id=<?php echo $product_id; ?>" class="ms-sellercontact" title="<?php echo $ms_sellercontact_title; ?>"><?php echo $ms_catalog_product_contact; ?></a></p>
						<?php } ?>
						<?php
							if ($seller['total_votes'] % 10 == 1) {
								$ms_rating_word = $ms_catalog_seller_profile_ratings_singular;
							} else {
								$ms_rating_word = $ms_catalog_seller_profile_ratings_plural;
							}
						?>
						<p><b><?php echo $ms_catalog_seller_profile_rating; ?></b> <?php echo $seller['avg_overall']; ?> (<?php echo $seller['total_votes'] . " " . $ms_rating_word; ?>)</p>
		    		</div>
		    	</div>
		    </div>
			<?php } ?>
      <div class="description">
		 <h3><?php echo $heading_title; ?></h3>
        <?php if ($manufacturer) { ?>
        <span><?php echo $text_manufacturer; ?></span> <a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a><br />
        <?php } ?>
        <span><?php echo $text_model; ?></span> <?php echo $model; ?><br />
        <?php if ($reward) { ?>
        <span><?php echo $text_reward; ?></span> <?php echo $reward; ?><br />
        <?php } ?>
        <span><?php echo $text_stock; ?></span> <?php echo $stock; ?></div>

      <?php if ($options) { ?>
      <div class="options">
        <h2><?php echo $text_option; ?></h2>
        <?php foreach ($options as $option) { ?>
        <?php if ($option['type'] == 'select') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
       
          <b><?php echo $option['name']; ?></b><?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <select name="option[<?php echo $option['product_option_id']; ?>]">
            <option value=""><?php echo $text_select; ?></option>
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
            </option>
            <?php } ?>
          </select>
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'radio') { ?>
        <div class=" left"><div id="option-<?php echo $option['product_option_id']; ?>" class="option">          
          <b><?php echo $option['name']; ?></b><?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>
		</div>
       
        <?php } ?>
        <?php if ($option['type'] == 'checkbox') { ?>
        <div class=" right"><div id="option-<?php echo $option['product_option_id']; ?>" class="option">          
          <b><?php echo $option['name']; ?></b><?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>
		</div>
        <?php } ?>
        <?php if ($option['type'] == 'image') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">          
          <b><?php echo $option['name']; ?></b><?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <table class="option-image">
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <tr>
              <td style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" /></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                  <?php if ($option_value['price']) { ?>
                  (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                  <?php } ?>
                </label></td>
            </tr>
            <?php } ?>
          </table>
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'text') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">         
          <b><?php echo $option['name']; ?></b> <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'textarea') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">         
          <b><?php echo $option['name']; ?></b> <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <textarea name="option[<?php echo $option['product_option_id']; ?>]" cols="40" rows="5"><?php echo $option['option_value']; ?></textarea>
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'file') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">         
          <b><?php echo $option['name']; ?></b> <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="boss_button_color boss_button_blue button">
          <input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'date') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option left">
          
          <b><?php echo $option['name']; ?></b><?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
        </div>
        <?php } ?>
        <?php if ($option['type'] == 'datetime') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option ">
         
          <b><?php echo $option['name']; ?></b> <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'time') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option right">
          
          <b><?php echo $option['name']; ?></b><?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
        </div>

        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
	  
      <?php if ($review_status) { ?>
      <div class="review">
        <div><img src="catalog/view/theme/bt_gomarket/image/stars-<?php echo $rating; ?>.png" alt="<?php echo $reviews; ?>" />&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');goToByScroll('tab-review');"><?php echo $reviews; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');goToByScroll('review-title');"><?php echo $text_write; ?></a></div>
        <div class="share"><!-- AddThis Button BEGIN -->
          <div class="addthis_default_style"><a class="addthis_button_compact"><?php echo $text_share; ?></a> <a class="addthis_button_email"></a><a class="addthis_button_print"></a> <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a></div>
          <script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script> 
          <!-- AddThis Button END --> 
        </div>
      </div>
      <?php } ?>
	  
      <div class="cart">
        <div><b><?php echo $text_qty; ?></b><br />
          <input type="text" name="quantity" size="2" value="<?php echo $minimum; ?>" />
          <input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
          &nbsp;
        <?php if ($minimum > 1) { ?>
        <div class="minimum"><?php echo $text_minimum; ?></div>
        <?php } ?>
			<?php if ($price) { ?>
				<div class="price">
					
					<?php if (!$special) { ?>
					<?php echo $price; ?>
					<?php } else { ?>
					<span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
					<?php } ?>	
			
					<?php if ($tax) { ?>
					<span class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></span><br />
					<?php } ?>
					<?php if ($points) { ?>
					<span class="reward"><small><?php echo $text_points; ?> <?php echo $points; ?></small></span><br />
					<?php } ?>
					<?php if ($discounts) { ?>
					
					<div class="discount">
					  <?php foreach ($discounts as $discount) { ?>
					  <?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?><br />
					  <?php } ?>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		<div class="buttons">
          <span class="boss_button"><input type="button" value="<?php echo $button_cart; ?>" id="button-cart" class="button" /></span>
		  <div class="boss_wish-compare">
		  <div class="wishlist"><a  onclick="boss_addToWishList('<?php echo $product_id; ?>');"><?php echo $button_wishlist; ?></a></div>
          <div class="compare"><a onclick="boss_addToCompare('<?php echo $product_id; ?>');"><?php echo $button_compare; ?></a></div>
		  </div>
		 </div>
        </div>
      </div>
    </div>
  </div>
  <div id="tabs" class="htabs ">
	<div class="boss_tab">
	<p>
	<a href="#tab-description"><?php echo $tab_description; ?></a>
	<?php if ($attribute_groups) { ?>
    <a href="#tab-attribute"><?php echo $tab_attribute; ?></a>
    <?php } ?>
    <?php if ($review_status) { ?>
    <a href="#tab-review"><?php echo $tab_review; ?></a>
    <?php } ?>
	</p>
	</div>
  </div>
  <h2 class="ta-header"><span><?php echo $tab_description; ?></span></h2>
  <div id="tab-description" class="tab-content"><?php echo $description; ?></div>
  <?php if ($attribute_groups) { ?>
  <h2 class="ta-header"><span><?php echo $tab_attribute; ?></span></h2>
  <div id="tab-attribute" class="tab-content">
    <table class="attribute">
      <?php foreach ($attribute_groups as $attribute_group) { ?>
      <thead>
        <tr>
          <td colspan="2"><?php echo $attribute_group['name']; ?></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
        <tr>
          <td><?php echo $attribute['name']; ?></td>
          <td><?php echo $attribute['text']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php } ?>
    </table>
  </div>
  <?php } ?>
  <?php if ($review_status) { ?>
  <h2 class="ta-header"><span><?php echo $tab_review; ?></span></h2>
  <div id="tab-review" class="tab-content">
    <div id="review"></div>
    <h2 id="review-title"><?php echo $text_write; ?></h2>
    <b><?php echo $entry_name; ?></b><br />
    <input type="text" name="name" value="" />
    <br />
    <br />
    <b><?php echo $entry_review; ?></b>
    <textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
    <span style="font-size: 11px;"><?php echo $text_note; ?></span><br />
    <br />
    <b><?php echo $entry_rating; ?></b> <span><?php echo $entry_bad; ?></span>&nbsp;
    <input type="radio" name="rating" value="1" />
    &nbsp;
    <input type="radio" name="rating" value="2" />
    &nbsp;
    <input type="radio" name="rating" value="3" />
    &nbsp;
    <input type="radio" name="rating" value="4" />
    &nbsp;
    <input type="radio" name="rating" value="5" />
    &nbsp;<span><?php echo $entry_good; ?></span><br />
    <br />
    <b><?php echo $entry_captcha; ?></b><br />
    <input type="text" name="captcha" value="" />
    <br />
    <img src="index.php?route=product/product/captcha" alt="" id="captcha" /><br />
    <br />
    <div class="buttons">
      <div class="left"><a id="button-review" class="button"><?php echo $button_continue; ?></a></div>
    </div>
  </div>
  <?php } ?>
 
 <?php if ($products) { ?>
 <div class="boss_related">
  <h2 class="ta-related"><span><b><?php echo $tab_related; ?> (<?php echo count($products); ?>)</span></b></h2>
  <div id="tab-related" class="tab-content">
      <div class="list_carousel responsive  product-grid">
	  <ul id="boss-image-related">
      <?php foreach ($products as $product) { ?>
      <li><div class="boss-tab-related">
        <?php if ($product['thumb']) { ?>
        <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a></div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/bt_gomarket/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
          <?php } ?>
        </div>
        <?php } ?>
		<div class="cart">
        <span class="boss_button"><input type="button" value="<?php echo $button_cart; ?>" onclick="boss_addToCart('<?php echo $product['product_id']; ?>');" class="button" /></span>
		</div>
		 <div class="wishlist"> <a onclick="boss_addToWishList('<?php echo $product['product_id']; ?>');"><?php echo $button_wishlist; ?></a></div>
         <div class="compare"><a onclick="boss_addToCompare('<?php echo $product['product_id']; ?>');"><?php echo $button_compare; ?></a></div>
        </div>
		</li>
      <?php } ?>
	  </ul>
		<a id="prev_related" class="prev" href="#" title="prev">&lt;</a>
		<a id="next_related" class="next" href="#" title="next">&gt;</a>
    </div>
  </div>
 </div>
  <?php } ?>
  
  <?php if ($tags) { ?>
  <div class="tags"><b><?php echo $text_tags; ?></b>
    <?php for ($i = 0; $i < count($tags); $i++) { ?>
    <?php if ($i < (count($tags) - 1)) { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>,
    <?php } else { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
    <?php } ?>
    <?php } ?>
  </div>
  <?php } ?>
  <?php echo $content_bottom; ?></div>
  
<script type="text/javascript" language="javascript" src="catalog/view/javascript/bossthemes/jquery.carouFredSel-6.2.0-packed.js"></script>
<script type="text/javascript" language="javascript" src="catalog/view/javascript/bossthemes/jquery.touchSwipe.min.js"></script>

<?php if (file_exists('catalog/view/theme/bt_gomarket/stylesheet/boss_carousel.css')) {
		echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/boss_carousel.css" media="screen" />';
	}
?>

<script type="text/javascript" language="javascript"><!--
$(window).load(function(){
	$('#boss-image-additional').carouFredSel({
		//auto: false,
		responsive: true,
		width: '100%',
		prev: '#prev_image_additional',
		next: '#next_image_additional',
		swipe: {
		onTouch : true
		},
		items: {
			width: 100,
			height: 100,
			visible: {
			min: 1,
			max: 3
			}
		},
		scroll: {
			direction : 'left',    //  The direction of the transition.
			duration  : 900   //  The duration of the transition.
		}
	});
	$('#boss-image-related').carouFredSel({
		auto: false,
		responsive: true,
		width: '100%',
		prev: '#prev_related',
		next: '#next_related',
		swipe: {
		onTouch : true
		},
		items: {
			width: 150,
			height: 305,
			visible: {
			min: 1,
			max: 6
			}
		},
		scroll: {
			direction : 'left',    //  The direction of the transition.
			duration  : 900   //  The duration of the transition.
		}
	});
});
//--></script>
<script type="text/javascript"><!--
function goToByScroll(id){
		$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
		$('h2.ta-header').removeClass('selected');
		$('#tab-review').prev().addClass('selected');
}
//--></script>  
  
<script type="text/javascript"><!--
$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=bossthemes/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
		$('.warning, .attention, information, .error').remove();
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			}  

			if (json['success']) {
				addProductNotice(json['title'], json['thumb'], json['success'], 'success');
				$('#cart_menu span.s_grand_total').html(json['total_sum']);
				$('#cart_menu div.s_cart_holder').html(json['output']);
				$('#cart-total').html(json['total']);
			}
		}
	});
});
//--></script>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: "colorbox",
		width: '80%', 
		height: '80%',
		maxWidth: <?php echo $this->config->get('config_image_popup_width') ?>,
        maxHeight: <?php echo ($this->config->get('config_image_popup_height') + 15); ?>
	});
});
//--></script> 

<?php if ($options) { ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<?php foreach ($options as $option) { ?>
<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
	action: 'index.php?route=product/product/upload',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
	},
	onComplete: function(file, json) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);
		
		$('.error').remove();
		
		if (json['success']) {
			alert(json['success']);
			
			$('input[name=\'option[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
		}
		
		if (json['error']) {
			$('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
		}
		
		$('.loading').remove();	
	}
});
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--
$('#review .pagination a').live('click', function() {
	$('#review').fadeOut('slow');
		
	$('#review').load(this.href);
	
	$('#review').fadeIn('slow');
	
	return false;
});			

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').bind('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('#review-title').after('<div class="warning">' + data['error'] + '</div>');
			}
			
			if (data['success']) {
				$('#review-title').after('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').attr('checked', '');
				$('input[name=\'captcha\']').val('');
			}
		}
	});
});
//--></script>
<script type="text/javascript"><!--
	$('h2.ta-header').first().addClass('selected');
	$('h2.ta-header').click(function() {
		if($(this).next().css('display') == 'none'){
			$(this).next().show();
			$(this).addClass('selected');
		}else{
			$(this).next().hide();
			$(this).removeClass('selected');
		}	
		return false;
	}).next().hide();	
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$(document).ready(function() {
	if ($.browser.msie && $.browser.version == 6) {
		$('.date, .datetime, .time').bgIframe();
	}

	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
});

//--></script>
<script type="text/javascript"><!--
	$(document).ready(function() {
		product_resize();
	});
	$(window).resize(function() {
		product_resize();
	});
	
	function disableLink(e) {
		e.preventDefault();
		return false;
	}

	function product_resize()	{
		if(getWidthBrowser() < 768){
			$('#tabs').hide();
			$('h2.ta-header').show();
		} else {
			$('h2.ta-header').hide();
			$('#tabs').show();
		}
	}

//--></script> 
<?php echo $footer; ?>