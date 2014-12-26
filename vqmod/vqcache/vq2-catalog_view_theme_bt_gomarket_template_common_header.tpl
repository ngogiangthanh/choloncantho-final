<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />

			<?php foreach($fbmetas as $fbmeta) {?>
			<meta property="<?php echo $fbmeta['property']; ?>" content="<?php echo addslashes($fbmeta['content']); ?>" />
			<?php } ?>
			
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/boss_add_cart.css" />
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/skeleton.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/responsive.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/getwidthbrowser.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/bossthemes.js"></script>
<script type="text/javascript" src="catalog/view/javascript/bossthemes/notify.js"></script>
<script type="text/javascript"> if (!window.console) console = {log: function() {}}; var config_language = <?php echo $dt_language; ?>; </script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/ie8.css" />
<![endif]-->

<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/ie9.css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/ie7.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/bt_gomarket/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#logo img');
</script>
<![endif]-->
<?php if ($stores) { ?>
<script type="text/javascript"><!--
$(document).ready(function() {
<?php foreach ($stores as $store) { ?>
$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
<?php } ?>
});
//--></script>
<?php } ?>
<?php echo $google_analytics; ?>
</head>
<?php 
	$array = (explode('/',$_SERVER['REQUEST_URI']));
	$end = end($array);
	if($end == "index.php" || $end == "home" || $end == ""){
		$home_page='home_page';
	}else{
		$home_page="other_page";
	}
?>
<body <?php echo 'class='.$home_page; ?>>
<div class="frame_container">
<div class="header-top">
	<div class="container">
		<div id="header-top" class="twenty-four columns">	
			<div id="welcome" class="seven columns alpha">
			<?php if (!$logged) { ?>
			<?php echo $text_welcome; ?>
			<?php } else { ?>
			<?php echo $text_logged; ?>
			<?php } ?>
			</div>
			<div class="links ten columns"><a class="no-need" href="<?php echo $account; ?>"><?php echo $text_account; ?></a><a href="<?php echo $wishlist; ?>" id="wishlist-total"><?php echo $text_wishlist; ?></a><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a><a class="no-need last" href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></div>
			<div class="right seven columns omega">	
				<div class="right">
				<?php echo $language; ?>
				<?php echo $currency; ?>				
				</div>
			</div>
		</div>
	</div>
</div>

<div id="container" class="container">
<div id="header" class="twenty-four columns">	
	<div class="header-middle">
		<?php if ($logo) { ?>
			<div id="logo" class="five columns alpha"><a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
		<?php } ?>
		<?php echo $boss_search; ?>
		<?php echo $cart; ?>
	</div>
	<div class="header-bottom">		
		<?php echo $boss_megamenu; ?>
		<?php echo $header_top; ?>
		<?php echo $header_bottom; ?>
	</div>
	<div class="clear"></div>
</div>
<div id="notification"></div>
<div class="twenty-four columns">
