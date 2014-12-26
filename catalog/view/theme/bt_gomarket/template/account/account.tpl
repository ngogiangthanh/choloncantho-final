<?php echo $header; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
     <a <?php echo(($breadcrumb == end($breadcrumbs)) ? 'class="last"' : ''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>

<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="nineteen columns omega"><?php echo $content_top; ?>

  <h1><?php echo $heading_title; ?></h1>
	<div class="eight columns alpha">
		<h2><?php echo $text_my_account; ?></h2>
		<div class="content myaccount">
			<ul>
			  <li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
			  <li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
			  <li><a href="<?php echo $address; ?>"><?php echo $text_address; ?></a></li>
			  <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
			</ul>
		</div>
	</div><!-- end -->
	<div class="eight columns alpha">
	  <h2><?php echo $text_my_orders; ?></h2>
	  <div class="content myaccount">
		<ul>
		  <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
		  <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
		  <?php if ($reward) { ?>
		  <li><a href="<?php echo $reward; ?>"><?php echo $text_reward; ?></a></li>
		  <?php } ?>
		  <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
		  <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
		</ul>
	  </div>
	</div>
	<div class="eight columns alpha">
	<h2><?php echo $text_my_newsletter; ?></h2>
	  <div class="content myaccount">
		<ul>
		  <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
		</ul>
	  </div>
	</div><br/>
	<div class="eight columns alpha" style="width: 100%">
	<h2 style="width: 100%"><?php echo $ms_account_seller_account; ?></h2>
		<div class="content">

					<ul class="ms-sellermenu <?php if ($this->config->get('msconf_graphical_sellermenu')) { ?>graphical<?php } ?>">
							<?php if ($ms_seller_created && $this->MsLoader->MsSeller->getStatus($this->customer->getId()) == MsSeller::STATUS_ACTIVE) { ?>
								<li>
									<a href="<?php echo $this->url->link('seller/account-dashboard', '', 'SSL'); ?>">
										<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
											<img src="catalog/view/theme/default/image/ms-graph-96.png" />
										<?php } ?>
										<?php echo $ms_account_dashboard; ?>
									</a>
								</li>
							<?php } ?>

							<li>
								<a href="<?php echo $this->url->link('seller/account-profile', '', 'SSL'); ?>">
									<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
										<?php if ($ms_seller_created) { ?>
										<img src="catalog/view/theme/default/image/ms-profile-96.png" />
										<?php } else { ?>
										<img src="catalog/view/theme/default/image/ms-profile-plus-96.png" />
										<?php } ?>
									<?php } ?>
									<?php echo $ms_seller_created ? $ms_account_sellerinfo : $ms_account_sellerinfo_new; ?>
								</a>
							</li>
							
							<?php if ($ms_seller_created && $this->MsLoader->MsSeller->getStatus($this->customer->getId()) == MsSeller::STATUS_ACTIVE) { ?>
								<li>
									<a href="<?php echo $this->url->link('seller/account-product/create', '', 'SSL'); ?>">
										<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
											<img src="catalog/view/theme/default/image/ms-bag-plus-96.png" />
										<?php } ?>
										<?php echo $ms_account_newproduct; ?>
									</a>
								</li>
								<li>
									<a href="<?php echo $this->url->link('seller/account-product', '', 'SSL'); ?>">
										<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
											<img src="catalog/view/theme/default/image/ms-bag-96.png" />
										<?php } ?>
										<?php echo $ms_account_products; ?>
									</a>
								</li>
								<li>
									<a href="<?php echo $this->url->link('seller/account-order', '', 'SSL'); ?>">
										<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
											<img src="catalog/view/theme/default/image/ms-cart-96.png" />
										<?php } ?>
										<?php echo $ms_account_orders; ?>
									</a>
								</li>
								<li>
									<a href="<?php echo $this->url->link('seller/account-transaction', '', 'SSL'); ?>">
										<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
											<img src="catalog/view/theme/default/image/ms-book-96.png" />
										<?php } ?>										
										<?php echo $ms_account_transactions; ?>
									</a>
								</li>
								<?php if ($this->config->get('msconf_enable_private_messaging') == 1) { ?>
									<li>
										<a href="<?php echo $this->url->link('account/msconversation', '', 'SSL'); ?>">
											<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
												<img src="catalog/view/theme/default/image/ms-envelope-96.png" />
											<?php } ?>
											<?php echo $ms_account_messages; ?>
										</a>
									</li>
								<?php } ?>
								<?php if ($this->config->get('msconf_allow_withdrawal_requests')) { ?>
									<li>
										<a href="<?php echo $this->url->link('seller/account-withdrawal', '', 'SSL'); ?>">
											<?php if($this->config->get('msconf_graphical_sellermenu')) { ?>
												<img src="catalog/view/theme/default/image/ms-dollar-96.png" />
											<?php } ?>											
											<?php echo $ms_account_withdraw; ?>
										</a>
									</li>
								<?php } ?>
							<?php } ?>
					</ul>
				</div>

  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?> 