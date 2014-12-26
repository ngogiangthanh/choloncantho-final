<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>

<div id="content" class="ms-account-dashboard">
	<?php echo $content_top; ?>
	
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	
	<h1><?php echo $ms_account_dashboard_heading; ?></h1>
	
	<?php if (isset($success) && ($success)) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	
	<div class="overview">
		<h3><?php echo $ms_account_dashboard_overview; ?></h3>
		<img src="<?php echo $seller['avatar']; ?>" /><br />
		<span class="nickname"><?php echo $seller['ms.nickname']; ?></span>
		<p><span><?php echo $ms_date_created; ?>:</span> <span><?php echo $seller['date_created']; ?></span></p>
		<p><span><?php echo $ms_account_dashboard_seller_group; ?>:</span> <span><?php echo $seller['seller_group']; ?></span></p>
		<p>
			<span><?php echo $ms_account_dashboard_listing; ?>:</span>
			
			<span>
			<?php echo $this->currency->getSymbolLeft(); ?><?php echo isset($seller['commission_rates'][MsCommission::RATE_LISTING]['flat']) ? $this->currency->format($seller['commission_rates'][MsCommission::RATE_LISTING]['flat'], $this->config->get('config_currency'), '', FALSE) : '0' ?><?php echo $this->currency->getSymbolRight(); ?>
			+ <?php echo isset($seller['commission_rates'][MsCommission::RATE_LISTING]['percent']) ? $seller['commission_rates'][MsCommission::RATE_LISTING]['percent'] : '0'; ?>%
			</span>
		</p>
		
		<p>
			<span><?php echo $ms_account_dashboard_sale; ?>:</span>
			
			<span>
			<?php echo $this->currency->getSymbolLeft(); ?><?php echo isset($seller['commission_rates'][MsCommission::RATE_SALE]['flat']) ? $this->currency->format($seller['commission_rates'][MsCommission::RATE_SALE]['flat'], $this->config->get('config_currency'), '', FALSE) : '0' ?><?php echo $this->currency->getSymbolRight(); ?>
			+ <?php echo isset($seller['commission_rates'][MsCommission::RATE_SALE]['percent']) ? $seller['commission_rates'][MsCommission::RATE_SALE]['percent'] : '0'; ?>%
			</span>
		</p>
	</div>
	
	<div class="stats">
		<h3><?php echo $ms_account_dashboard_stats; ?></h3>
		<p><span><?php echo $ms_account_dashboard_balance; ?>:</span> <span><?php echo $seller['balance']; ?></span></p>
		<p><span><?php echo $ms_account_dashboard_total_sales; ?>:</span> <span><?php echo $seller['total_sales']; ?></span></p>
		<p><span><?php echo $ms_account_dashboard_total_earnings; ?>:</span> <span><?php echo $seller['total_earnings']; ?></span></p>
		<p><span><?php echo $ms_account_dashboard_sales_month; ?>:</span> <span><?php echo $seller['sales_month']; ?></span></p>
		<p><span><?php echo $ms_account_dashboard_earnings_month; ?>:</span> <span><?php echo $seller['earnings_month']; ?></span></p>	
		
		<h3><?php echo $ms_account_badges; ?></h3>
		<p>
		<?php if (isset($seller['badges']) && $seller['badges']) { ?>
		<?php foreach($seller['badges'] as $badge) { ?>
			<img src="<?php echo $badge['image']; ?>" title="<?php echo $badge['description']; ?>" />
		<?php } ?>
		<?php } else { ?>
			<p><?php echo $ms_account_badges_nobadges; ?></p>
		<?php } ?>
		</p>
	</div>
	
	<div class="nav">
		<h3><?php echo $ms_account_dashboard_nav; ?></h3>
		<a href="<?php echo $this->url->link('seller/account-profile', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-profile.png" />
			<span><?php echo $ms_account_dashboard_nav_profile; ?></span>
		</a>

		<a href="<?php echo $this->url->link('seller/account-product/create', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-bag-plus.png" />
			<span><?php echo $ms_account_dashboard_nav_product; ?></span>
		</a>

		<a href="<?php echo $this->url->link('seller/account-product', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-bag.png" />
			<span><?php echo $ms_account_dashboard_nav_products; ?></span>
		</a>
		
		<a href="<?php echo $this->url->link('seller/account-order', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-cart-96.png" />
			<span><?php echo $ms_account_dashboard_nav_orders; ?></span>
		</a>
		
		<a href="<?php echo $this->url->link('seller/account-transaction', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-book-96.png" />
			<span><?php echo $ms_account_dashboard_nav_balance; ?></span>
		</a>
		
		<?php if ($this->config->get('msconf_enable_private_messaging') == 1) { ?>
		<a href="<?php echo $this->url->link('account/msconversation', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-envelope-96.png" />
			<span><?php echo $ms_account_messages; ?></span>
		</a>
		<?php } ?>
		
		<?php if ($this->config->get('msconf_allow_withdrawal_requests')) { ?>
		<a href="<?php echo $this->url->link('seller/account-withdrawal', '', 'SSL'); ?>">
			<img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/ms-dollar.png" />
			<span><?php echo $ms_account_dashboard_nav_payout; ?></span>
		</a>
		<?php } ?>
	</div>
	
	<h2><?php echo $ms_account_dashboard_orders; ?></h2>
	<table class="list">
		<thead>
			<tr>
				<td><?php echo $ms_account_orders_id; ?></td>
				<?php if (!$this->config->get('msconf_hide_customer_email')) { ?>
					<td><?php echo $ms_account_orders_customer; ?></td>
				<?php } ?>
				<td style="width: 40%"><?php echo $ms_account_orders_products; ?></td>
				<td><?php echo $ms_date_created; ?></td>
				<td><?php echo $ms_account_orders_total; ?></td>
			</tr>
		</thead>
		
		<tbody>
		<?php if (isset($orders) && $orders) { ?>
			<?php foreach ($orders as $order) { ?>
			<tr>
				<td><?php echo $order['order_id']; ?></td>
				<?php if (!$this->config->get('msconf_hide_customer_email')) { ?>
					<td><?php echo $order['customer']; ?></td>
				<?php } ?>
				<td class="left products">
				<?php foreach ($order['products'] as $p) { ?>
				<p>
					<span class="name"><?php if ($p['quantity'] > 1) { echo "{$p['quantity']} x "; } ?> <a href="<?php echo $this->url->link('product/product', 'product_id=' . $p['product_id'], 'SSL'); ?>"><?php echo $p['name']; ?></a></span>
					<span class="total"><?php echo $this->currency->format($p['seller_net_amt'], $this->config->get('config_currency')); ?></span>
				</p>
				<?php } ?>
				</td>
				<td><?php echo $order['date_created']; ?></td>
				<td><?php echo $order['total']; ?></td>
			</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td class="center" colspan="5"><?php echo $ms_account_orders_noorders; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	
	<br />
	<h2><?php echo $ms_account_dashboard_comments; ?></h2>
	<table class="list comments">
		<thead>
			<tr>
				<td class="name"><?php echo $ms_account_comments_name; ?></a></td>
				<td class="product"><?php echo $ms_account_comments_product; ?></a></td>
				<td class="comment"><?php echo $ms_account_comments_comment; ?></a></td>
				<td class="date"><?php echo $ms_date; ?></a></td>
			</tr>
		</thead>
		
		<tbody>
			<?php if (isset($comments) && $comments) { ?>
			<?php foreach ($comments as $comment) { ?>
			<tr>
				<td><?php echo $comment['name']; ?></td>
				<td><a href="<?php echo $this->url->link('product/product', 'product_id=' . $comment['product_id'], 'SSL'); ?>"><?php echo $comment['product_name']; ?></a></td>
				<td><?php echo $comment['comment']; ?></td>
				<td><?php echo $comment['date_created']; ?></td>
			</tr>
			<?php } ?>
			<?php } else { ?>
			<tr>
				<td class="center" colspan="4"><?php echo $ms_account_comments_nocomments; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<div class="buttons">
		<div class="left">
			<a href="<?php echo $link_back; ?>" class="button">
				<span><?php echo $button_back; ?></span>
			</a>
		</div>
	</div>
	
	<?php echo $content_bottom; ?>
</div>

<?php echo $footer; ?>