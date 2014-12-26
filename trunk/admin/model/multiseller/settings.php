<?php
class ModelMultisellerSettings extends Model {
	public function __construct($registry) {
		parent::__construct($registry);
		$this->load->model('localisation/language');
	}
	public function checkDbVersion($version) {
		switch ($version) {
			case "4.3":
				$res = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "ms_version'");
				if ($res->num_rows) {
					$res = $this->db->query("SELECT version FROM `" . DB_PREFIX . "ms_version` WHERE version >= '4.3'");
				}
				break;
		
			case "4.2":
				$res = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "ms_version'");
				if ($res->num_rows) {
					$res = $this->db->query("SELECT version FROM `" . DB_PREFIX . "ms_version` WHERE version >= '4.2'");
				}
				break;
			
			case "4.1":
				$res = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "ms_version'");
				if ($res->num_rows) {
					$res = $this->db->query("SELECT version FROM `" . DB_PREFIX . "ms_version` WHERE version >= '4.1'");
				}
				break;
			
			case "4.0":
				if ($this->MsLoader->dist == "standard") {
					$res = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "ms_attribute` LIKE 'tab_display'");
				}
				else if ($this->MsLoader->dist == "lite") {
					$res = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "ms_attribute`");
				}
				break;

			case "SE":
				//$res = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "ms_product_shipping_method` LIKE 'product_id'");
				$res = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "ms_seller` LIKE 'shipping_type'");
				break;
		}
		
		if (!isset($res) || (isset($res) && $res->num_rows))
			return true;
			
		return false;
	}

	public function update($version) {
		if (!$this->checkDbVersion($version)) {
			switch ($version) {
				case "SE":
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_product_shipping_method` (`product_shipping_method_id` int(11) NOT NULL AUTO_INCREMENT, `product_id` int(11) NOT NULL, `shipping_method_id` int(11) NOT NULL, `geo_zone_id` int(11) NOT NULL, `cost` DECIMAL(15,8) NOT NULL, `comment` TEXT DEFAULT '', PRIMARY KEY (`product_shipping_method_id`)) DEFAULT CHARSET=utf8");
					//`currency_id` int(11) NOT NULL, `currency_code` VARCHAR(3) NOT NULL,
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_seller_shipping_method` (`seller_shipping_method_id` int(11) NOT NULL AUTO_INCREMENT, `seller_id` int(11) NOT NULL, `shipping_method_id` int(11) NOT NULL, `geo_zone_id` int(11) NOT NULL, `weight_class_id` int(11) NOT NULL, `weight_step` DECIMAL(15,4) NOT NULL, `cost_per_unit` DECIMAL(15,8) NOT NULL, `comment` TEXT DEFAULT '', PRIMARY KEY (`seller_shipping_method_id`)) DEFAULT CHARSET=utf8");
					//`currency_id` int(11) NOT NULL, `currency_code` VARCHAR(3) NOT NULL,
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_shipping_method_range` (`range_id` int(11) NOT NULL AUTO_INCREMENT, `seller_shipping_method_id` int(11) NOT NULL, `from` DECIMAL(15,4) NOT NULL, `to` DECIMAL(15,4) NOT NULL, `cost` DECIMAL(15,8) NOT NULL, PRIMARY KEY (`range_id`)) default CHARSET=utf8");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_shipping_method` (`shipping_method_id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`shipping_method_id`)) default CHARSET=utf8");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_shipping_method_description` (`shipping_method_description_id` int(11) NOT NULL AUTO_INCREMENT, `shipping_method_id` int(11) NOT NULL, `name` VARCHAR(32) NOT NULL DEFAULT '', `description` TEXT DEFAULT '', `language_id` int(11) DEFAULT NULL, PRIMARY KEY (`shipping_method_description_id`)) default CHARSET=utf8");
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_seller` ADD (`shipping_type` TINYINT NOT NULL)");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_order_shipping` (`order_shipping_id` int(11) NOT NULL AUTO_INCREMENT, `shipping_type` TINYINT NOT NULL, `order_id` int(11) NOT NULL, `seller_id` int(11) DEFAULT NULL, PRIMARY KEY (`order_shipping_id`)) DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_order_product_shippable` (`order_product_shippable_id` int(11) NOT NULL AUTO_INCREMENT, `shippable` tinyint(1) NOT NULL, `order_id` int(11) NOT NULL, `product_id` int(11) DEFAULT NULL, PRIMARY KEY (`order_product_shippable_id`)) DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_order_product_shipping` (`order_product_shipping_id` int(11) NOT NULL AUTO_INCREMENT, `shipping_method_name` VARCHAR(32) NOT NULL DEFAULT '', `shipping_cost` DECIMAL(15,4) NOT NULL, `product_id` int(11) NOT NULL, `order_id` int(11) NOT NULL, `seller_id` int(11) DEFAULT NULL, PRIMARY KEY (`order_product_shipping_id`)) DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_order_seller_shipping` (`order_seller_shipping_id` int(11) NOT NULL AUTO_INCREMENT, `shipping_method_name` VARCHAR(32) NOT NULL DEFAULT '', `shipping_cost` DECIMAL(15,4) NOT NULL, `order_id` int(11) NOT NULL, `seller_id` int(11) DEFAULT NULL, PRIMARY KEY (`order_seller_shipping_id`)) DEFAULT CHARSET=utf8");
					$this->db->query("CREATE TABLE `" . DB_PREFIX . "ms_order_shipping_tracking` (`order_shipping_tracking_id` int(11) NOT NULL AUTO_INCREMENT, `shipped` tinyint(1) NOT NULL, `tracking_number` VARCHAR(32) NOT NULL DEFAULT '', `comment` TEXT DEFAULT '', `order_id` int(11) NOT NULL, `seller_id` int(11) DEFAULT NULL, PRIMARY KEY (`order_shipping_tracking_id`)) DEFAULT CHARSET=utf8");
					$this->db->query("INSERT INTO " . DB_PREFIX . "ms_shipping_method () VALUES()");
					$shipping_method_id = $this->db->getLastId();
					$this->load->model('localisation/language');
					$languages = $this->model_localisation_language->getLanguages();
					foreach ($languages as $code => $language) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "ms_shipping_method_description SET shipping_method_id = '" . (int)$shipping_method_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Default carrier', description = 'Default shipping carrier company (delete it)'");
					}
					$this->db->query("UPDATE `" . DB_PREFIX . "extension` SET code = 'ms_shipping' WHERE code = 'shipping'");
					$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET `key` = 'ms_shipping_status' WHERE `key` = 'shipping_status'");
					
					// Permissions for Shipping Methods Area
					$this->load->model('user/user_group');
					$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'multiseller/shipping-method');
					$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'multiseller/shipping-method');
					
					// Enable shipping by default
					$this->db->query("UPDATE `" . DB_PREFIX . "setting` SET `value` = '2' WHERE `key` = 'msconf_enable_shipping'");
					break;
					
				case "4.3":
					$this->db->query("INSERT INTO " . DB_PREFIX . "ms_version (version, distribution) VALUES('4.3','" . $this->MsLoader->dist ."')");
					// Seller Groups
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_seller_group` ADD `product_period` int(5) DEFAULT 0");
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_seller_group` ADD `product_quantity` int(5) DEFAULT 0");
					
					// Listing Period
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_product` ADD `list_until` DATE DEFAULT NULL");
					
					// Region/County for seller
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_seller` ADD `zone_id` INT(11) NOT NULL DEFAULT '0'");

					// Ratings
					$sql = "
						CREATE TABLE `" . DB_PREFIX . "ms_rating` (
						 `rating_id` int(11) NOT NULL AUTO_INCREMENT,
						 `evaluator_id` int(11) DEFAULT NULL,
						 `rated_user_id` int(11) DEFAULT NULL,
						 `order_id` int(11) DEFAULT NULL,
						 `comment` VARCHAR(255) DEFAULT NULL,
						 `rating_overall` int(1) DEFAULT NULL,
						 `rating_communication` int(1) DEFAULT NULL,
						 `rating_honesty` int(1) DEFAULT NULL,
						PRIMARY KEY (`rating_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					break;
				
				case "4.2":
					$this->db->query("INSERT INTO " . DB_PREFIX . "ms_version (version, distribution) VALUES('" . $this->MsLoader->version . "','" . $this->MsLoader->dist ."')");
					break;
					
				case "4.1":
					$this->db->query("INSERT INTO " . DB_PREFIX . "ms_version (version, distribution) VALUES('" . $this->MsLoader->version . "','" . $this->MsLoader->dist ."')");
				
					// Conversations
					$sql = "
						CREATE TABLE `" . DB_PREFIX . "ms_conversation` (
						 `conversation_id` int(11) NOT NULL AUTO_INCREMENT,
						 `product_id` int(11) DEFAULT NULL,
						 `order_id` int(11) DEFAULT NULL,
						 `title` varchar(256) NOT NULL DEFAULT '',
						 `date_created` DATETIME NOT NULL,
						PRIMARY KEY (`conversation_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					
					// Messages
					$sql = "
					CREATE TABLE `" . DB_PREFIX . "ms_message` (
					`message_id` int(11) NOT NULL AUTO_INCREMENT,
					`conversation_id` int(11) NOT NULL,
					`from` int(11) DEFAULT NULL,
					`to` int(11) DEFAULT NULL,
					`message` text NOT NULL DEFAULT '',
					`read` tinyint(1) NOT NULL DEFAULT 0,
					`date_created` DATETIME NOT NULL,
					PRIMARY KEY (`message_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					
					break;
					
				case "4.0":
					// badge admin area
					$this->load->model('user/user_group');
					$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'multiseller/badge');
					$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'multiseller/badge');
					
					// add badges table
					$sql = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ms_badge` (
					`badge_id` int(11) NOT NULL AUTO_INCREMENT,
					`image` varchar(255) DEFAULT NULL,
					PRIMARY KEY (`badge_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					
					$sql = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ms_badge_description` (
					`badge_id` int(11) NOT NULL,
					`name` varchar(32) NOT NULL DEFAULT '',
					`description` text NOT NULL,
					`language_id` int(11) DEFAULT NULL,
					PRIMARY KEY (`badge_id`, `language_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					
					$sql = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ms_badge_seller_group` (
					`badge_id` INT(11) NOT NULL,
					`seller_id` int(11) DEFAULT NULL,
					`seller_group_id` int(11) DEFAULT NULL,
					PRIMARY KEY (`badge_id`, `seller_id`, `seller_group_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					
					// add version table
					$sql = "
					CREATE TABLE `" . DB_PREFIX . "ms_version` (
					`version_id` int(11) NOT NULL AUTO_INCREMENT,
					`version` VARCHAR(32) NOT NULL DEFAULT '',
					`distribution` VARCHAR(32) NOT NULL DEFAULT '',
					PRIMARY KEY (`version_id`)) default CHARSET=utf8";
					$this->db->query($sql);
					
					$this->db->query("INSERT INTO " . DB_PREFIX . "ms_version (version, distribution) VALUES('" . $this->MsLoader->version . "','" . $this->MsLoader->dist ."')");
					
					// add attribute table & copy data
					$sql = "
						CREATE TABLE `" . DB_PREFIX . "ms_attribute_attribute` (
						 `ms_attribute_id` int(11) DEFAULT NULL,
						 `oc_attribute_id` int(11) DEFAULT NULL,
						 PRIMARY KEY (`ms_attribute_id`, `oc_attribute_id`)
						) DEFAULT CHARSET=utf8";
					$this->db->query($sql);
					
					// todo add tab_display attribute field
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_attribute` ADD `tab_display` TINYINT NOT NULL DEFAULT 0");
					
					// update attribute structure
					$this->MsLoader->MsAttribute->migrateAttributes();
					
					// todo alter comments table, product_id 0 -> NULL
					$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_comments` CHANGE `product_id` `product_id` int(11) DEFAULT NULL");
					
					// create layouts
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller Account'");
					$layout_id = $this->db->getLastId();
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/account'");
					
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller List'");
					$layout_id = $this->db->getLastId();
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/catalog-seller'");
					
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller Profile'");
					$layout_id = $this->db->getLastId();
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/catalog-seller/profile'");
					
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller Products'");
					$layout_id = $this->db->getLastId();
					$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/catalog-seller/products'");
					
					$res = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "ms_payment` LIKE 'order_id'");
					if (!$res->num_rows) {
						$this->db->query("ALTER TABLE `" . DB_PREFIX . "ms_payment` ADD `order_id` int(11) DEFAULT NULL");
					}
					break;
					
				default:
					break;
			}
		}
	}

	public function createTable() {
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_version` (
			 `version_id` int(11) NOT NULL AUTO_INCREMENT,
			 `version` VARCHAR(32) NOT NULL DEFAULT '',
			 `distribution` VARCHAR(32) NOT NULL DEFAULT '',
			PRIMARY KEY (`version_id`)) default CHARSET=utf8";
		$this->db->query($sql);
	
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_commission` (
			 `commission_id` int(11) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (`commission_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_commission_rate` (
			 `rate_id` int(11) NOT NULL AUTO_INCREMENT,
			 `rate_type` int(11) NOT NULL,
			 `commission_id` int(11) NOT NULL,
			 `flat` DECIMAL(15,4),
			 `percent` DECIMAL(15,2),
			 `payment_method` TINYINT DEFAULT NULL,
			PRIMARY KEY (`rate_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_seller_group` (
			 `seller_group_id` int(11) NOT NULL AUTO_INCREMENT,
			 `commission_id` int(11) DEFAULT NULL,
			 `product_period` int(5) DEFAULT 0,
			 `product_quantity` int(5) DEFAULT 0,
			PRIMARY KEY (`seller_group_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
				
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_seller_group_description` (
			 `seller_group_description_id` int(11) NOT NULL AUTO_INCREMENT,
			 `seller_group_id` int(11) NOT NULL,
			 `name` VARCHAR(32) NOT NULL DEFAULT '',
			 `description` TEXT NOT NULL DEFAULT '',
			 `language_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`seller_group_description_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_product` (
			 `product_id` int(11) NOT NULL,
			 `seller_id` int(11) DEFAULT NULL,
			 `number_sold` int(11) NOT NULL DEFAULT '0',
			 `product_status` TINYINT NOT NULL,
			 `product_approved` TINYINT NOT NULL,
			 `list_until` DATE DEFAULT NULL,
			PRIMARY KEY (`product_id`)) default CHARSET=utf8";
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_seller` (
			 `seller_id` int(11) NOT NULL AUTO_INCREMENT,
			 `nickname` VARCHAR(32) NOT NULL DEFAULT '',
			 `company` VARCHAR(32) NOT NULL DEFAULT '',
			 `website` VARCHAR(2083) NOT NULL DEFAULT '',
			 `description` TEXT NOT NULL DEFAULT '',
			 `country_id` INT(11) NOT NULL DEFAULT '0',
			 `zone_id` INT(11) NOT NULL DEFAULT '0',
			 `avatar` VARCHAR(255) DEFAULT NULL,
			 `paypal` VARCHAR(255) DEFAULT NULL,
			 `date_created` DATETIME NOT NULL,
			 `seller_status` TINYINT NOT NULL,
			 `seller_approved` TINYINT NOT NULL,
			 `product_validation` tinyint(4) NOT NULL DEFAULT '1',
			 `seller_group` int(11) NOT NULL DEFAULT '1',
			 `commission_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`seller_id`)) default CHARSET=utf8";
		$this->db->query($sql);

		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_rating` (
			 `rating_id` int(11) NOT NULL AUTO_INCREMENT,
			 `evaluator_id` int(11) DEFAULT NULL,
			 `rated_user_id` int(11) DEFAULT NULL,
			 `order_id` int(11) DEFAULT NULL,
			 `comment` VARCHAR(255) DEFAULT NULL,
			 `rating_overall` int(1) DEFAULT NULL,
			 `rating_communication` int(1) DEFAULT NULL,
			 `rating_honesty` int(1) DEFAULT NULL,
			PRIMARY KEY (`rating_id`)) default CHARSET=utf8";
		$this->db->query($sql);
		
		$createTable = " CREATE TABLE " . DB_PREFIX . "ms_comments (
			 `id` int(11) NOT NULL AUTO_INCREMENT,
			 `parent_id` int(11) DEFAULT NULL,
			 `product_id` int(11) DEFAULT NULL,
			 `seller_id` int(11) DEFAULT NULL,
			 `customer_id` int(11) DEFAULT NULL,
			 `user_id` int(11) DEFAULT NULL,
			 `name` varchar(128) NOT NULL DEFAULT '',
			 `email` varchar(128) NOT NULL DEFAULT '',
			 `comment` text NOT NULL,
			 `display` tinyint(1) NOT NULL DEFAULT 1,
			 `create_time` int(11) NOT NULL,
			PRIMARY KEY (`id`)) default CHARSET=utf8";
		$this->db->query($createTable);
	
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_balance` (
			 `balance_id` int(11) NOT NULL AUTO_INCREMENT,
			 `seller_id` int(11) NOT NULL,
			 `order_id` int(11) DEFAULT NULL,
			 `product_id` int(11) DEFAULT NULL,
			 `withdrawal_id` int(11) DEFAULT NULL,
			 `balance_type` int(11) DEFAULT NULL,
			 `amount` DECIMAL(15,4) NOT NULL,
			 `balance` DECIMAL(15,4) NOT NULL,
			 `description` TEXT NOT NULL DEFAULT '',
			 `date_created` DATETIME NOT NULL,
			 `date_modified` DATETIME DEFAULT NULL,
			PRIMARY KEY (`balance_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
	
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_order_product_data` (
			 `order_product_data_id` int(11) NOT NULL AUTO_INCREMENT,
			 `order_id` int(11) NOT NULL,
			 `product_id` int(11) NOT NULL,
			 `seller_id` int(11) DEFAULT NULL,
			 `store_commission_flat` DECIMAL(15,4) NOT NULL,
			 `store_commission_pct` DECIMAL(15,4) NOT NULL,
			 `seller_net_amt` DECIMAL(15,4) NOT NULL,
			PRIMARY KEY (`order_product_data_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_criteria - criterias table
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_criteria` (
			 `criteria_id` int(11) NOT NULL AUTO_INCREMENT,
			 `criteria_type` TINYINT NOT NULL,
			 `range_id` int(11) NOT NULL,
			PRIMARY KEY (`criteria_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_range_int - int criteria range table
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_range_int` (
			 `range_id` int(11) NOT NULL AUTO_INCREMENT,
			 `from` int(11) NOT NULL,
			 `to` int(11) NOT NULL,
			PRIMARY KEY (`range_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_range_decimal - decimal criteria range table
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_range_decimal` (
			 `range_id` int(11) NOT NULL AUTO_INCREMENT,
			 `from` DECIMAL(15,4) NOT NULL,
			 `to` DECIMAL(15,4) NOT NULL,
			PRIMARY KEY (`range_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_range_periodic - periodic criteria range table
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_range_date` (
			 `range_id` int(11) NOT NULL AUTO_INCREMENT,
			 `from` DATETIME,
			 `to` DATETIME NOT NULL,
			PRIMARY KEY (`range_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_seller_group_criteria - table, which connects concrete commissions for criterias in the seller groups
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_seller_group_criteria` (
			 `seller_group_criteria_id` int(11) NOT NULL AUTO_INCREMENT,
			 `commission_id` int(11) NOT NULL,
			 `criteria_id` int(11) NOT NULL,
			PRIMARY KEY (`seller_group_criteria_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// new attributes
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_attribute` (
			`attribute_id` int(11) NOT NULL AUTO_INCREMENT,
			`attribute_type` int(11) NOT NULL,
			`number` TINYINT NOT NULL DEFAULT 0,
			`multilang` TINYINT NOT NULL DEFAULT 0,
			`tab_display` TINYINT NOT NULL DEFAULT 0,
			`required` TINYINT NOT NULL DEFAULT 0,
			`enabled` TINYINT NOT NULL DEFAULT 1,
			`sort_order` int(3) NOT NULL,
			PRIMARY KEY (`attribute_id`)
			) DEFAULT CHARSET=utf8";
		$this->db->query($sql);

		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_attribute_description` (
			 `attribute_id` int(11) NOT NULL,
			 `language_id` int(11) NOT NULL,
			 `name` varchar(128) NOT NULL,
			 `description` TEXT NOT NULL DEFAULT '',
			 PRIMARY KEY (`attribute_id`,`language_id`)
			) DEFAULT CHARSET=utf8";
		$this->db->query($sql);

		$sql = " 
			CREATE TABLE `" . DB_PREFIX . "ms_attribute_value` (
			 `attribute_value_id` int(11) NOT NULL AUTO_INCREMENT,
			 `attribute_id` int(11) NOT NULL,
			 `image` varchar(255) NOT NULL,
			 `sort_order` int(3) NOT NULL,
			 PRIMARY KEY (`attribute_value_id`)
			) DEFAULT CHARSET=utf8";
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_attribute_value_description` (
			 `attribute_value_id` int(11) NOT NULL,
			 `language_id` int(11) NOT NULL,
			 `attribute_id` int(11) NOT NULL,
			 `name` varchar(128) NOT NULL,
			 PRIMARY KEY (`attribute_value_id`,`language_id`)
			) DEFAULT CHARSET=utf8";		
		$this->db->query($sql);
		
		$sql = " 
			CREATE TABLE `" . DB_PREFIX . "ms_attribute_attribute` (
			 `ms_attribute_id` int(11) DEFAULT NULL,
			 `oc_attribute_id` int(11) DEFAULT NULL,
			 PRIMARY KEY (`ms_attribute_id`, `oc_attribute_id`)
			) DEFAULT CHARSET=utf8";
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_product_attribute` (
			 `product_id` int(11) NOT NULL,
			 `attribute_id` int(11) NOT NULL,
			 `attribute_value_id` int(11) NOT NULL,
			PRIMARY KEY (`product_id`,`attribute_id`,`attribute_value_id`)) default CHARSET=utf8";
		$this->db->query($sql);

		// new payments
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_payment` (
			 `payment_id` int(11) NOT NULL AUTO_INCREMENT,
			 `seller_id` int(11) NOT NULL,
			 `product_id` int(11) DEFAULT NULL,
			 `order_id` int(11) DEFAULT NULL,
			 `payment_type` int(11) NOT NULL,
			 `payment_status` int(11) NOT NULL,
			 `payment_method` int(11) NOT NULL,
			 `payment_data` TEXT NOT NULL DEFAULT '',
			 `amount` DECIMAL(15,4) NOT NULL,
			 `currency_id` int(11) NOT NULL,
			 `currency_code` VARCHAR(3) NOT NULL,
			 `description` TEXT NOT NULL DEFAULT '',
			 `date_created` DATETIME NOT NULL,
			 `date_paid` DATETIME DEFAULT NULL,
			PRIMARY KEY (`payment_id`)) default CHARSET=utf8";
		$this->db->query($sql);
		
		$sql = "
			CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ms_badge` (
			  `badge_id` int(11) NOT NULL AUTO_INCREMENT,
			  `image` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`badge_id`)) default CHARSET=utf8";
		$this->db->query($sql);	
		
		$sql = "
			CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ms_badge_description` (
			  `badge_id` int(11) NOT NULL,
			  `name` varchar(32) NOT NULL DEFAULT '',
			  `description` text NOT NULL,
			  `language_id` int(11) DEFAULT NULL,
			  PRIMARY KEY (`badge_id`, `language_id`)) default CHARSET=utf8";
		$this->db->query($sql);	
		
		$sql = "
			CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ms_badge_seller_group` (
				`badge_id` INT(11) NOT NULL,
				`seller_id` int(11) DEFAULT NULL,
				`seller_group_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`badge_id`, `seller_id`, `seller_group_id`)) default CHARSET=utf8";
		$this->db->query($sql);
		
		// v4.1 ->>>
		// Conversations
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_conversation` (
			 `conversation_id` int(11) NOT NULL AUTO_INCREMENT,
			 `product_id` int(11) DEFAULT NULL,
			 `order_id` int(11) DEFAULT NULL,
			 `title` varchar(256) NOT NULL DEFAULT '',
			 `date_created` DATETIME NOT NULL,
			PRIMARY KEY (`conversation_id`)) default CHARSET=utf8";
		$this->db->query($sql);
		
		// Messages
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_message` (
			`message_id` int(11) NOT NULL AUTO_INCREMENT,
			`conversation_id` int(11) NOT NULL,
			`from` int(11) DEFAULT NULL,
			`to` int(11) DEFAULT NULL,
			`message` text NOT NULL DEFAULT '',
			`read` tinyint(1) NOT NULL DEFAULT 0,
			`date_created` DATETIME NOT NULL,
			PRIMARY KEY (`message_id`)) default CHARSET=utf8";
		$this->db->query($sql);
		
		/********************
		 ***** PHYSICAL *****
		 ********************/
		
		// ms_product_shipping_method - table containing information about shipping methods for each product
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_product_shipping_method` (
				`product_shipping_method_id` int(11) NOT NULL AUTO_INCREMENT,
				`product_id` int(11) NOT NULL,
				`shipping_method_id` int(11) NOT NULL,
				`geo_zone_id` int(11) NOT NULL,
				`cost` DECIMAL(15,8) NOT NULL,
				`comment` TEXT DEFAULT '',
			PRIMARY KEY (`product_shipping_method_id`)) DEFAULT CHARSET=utf8";
			//`currency_id` int(11) NOT NULL,
			//`currency_code` VARCHAR(3) NOT NULL,
		
		$this->db->query($sql);
		
		// ms_seller_shipping_method - table containing information about shipping methods for each seller (if combinable shipping is enabled)
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_seller_shipping_method` (
				`seller_shipping_method_id` int(11) NOT NULL AUTO_INCREMENT,
				`seller_id` int(11) NOT NULL,
				`shipping_method_id` int(11) NOT NULL,
				`geo_zone_id` int(11) NOT NULL,
				`weight_class_id` int(11) NOT NULL,
				`weight_step` DECIMAL(15,4) NOT NULL,
				`cost_per_unit` DECIMAL(15,8) NOT NULL,
				`comment` TEXT DEFAULT '',
			PRIMARY KEY (`seller_shipping_method_id`)) DEFAULT CHARSET=utf8";
			//`currency_id` int(11) NOT NULL,
			//`currency_code` VARCHAR(3) NOT NULL,
		
		$this->db->query($sql);
		
		// ms_shipping_method_range - range table for the shipping methods
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_shipping_method_range` (
			`range_id` int(11) NOT NULL AUTO_INCREMENT,
			 `seller_shipping_method_id` int(11) NOT NULL,
			 `from` DECIMAL(15,4) NOT NULL,
			 `to` DECIMAL(15,4) NOT NULL,
			 `cost` DECIMAL(15,8) NOT NULL,
			PRIMARY KEY (`range_id`)) default CHARSET=utf8";
		
		// ms_shipping_method - table containing shipping methods (only IDs at the moment)
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_shipping_method` (
				`shipping_method_id` int(11) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (`shipping_method_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_shipping_method_description - table containing information about shipping methods (for each language)
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_shipping_method_description` (
				`shipping_method_description_id` int(11) NOT NULL AUTO_INCREMENT,
				`shipping_method_id` int(11) NOT NULL,
				`name` VARCHAR(32) NOT NULL DEFAULT '',
				`description` TEXT DEFAULT '',
				`language_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`shipping_method_description_id`)) default CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_seller - add shipping type column
		$sql = "
			ALTER TABLE `" . DB_PREFIX . "ms_seller` ADD (
				`shipping_type` TINYINT NOT NULL)";
		$this->db->query($sql);
		
		// ms_order_shipping - table containing information (shipping_type) about shipping for each order
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_order_shipping` (
				`order_shipping_id` int(11) NOT NULL AUTO_INCREMENT,
				`shipping_type` TINYINT NOT NULL,
				`order_id` int(11) NOT NULL,
				`seller_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`order_shipping_id`)) DEFAULT CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_order_product_shippable - table containing information (whether it is shippable in particular) about each order product
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_order_product_shippable` (
				`order_product_shippable_id` int(11) NOT NULL AUTO_INCREMENT,
				`shippable` tinyint(1) NOT NULL,
				`order_id` int(11) NOT NULL,
				`product_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`order_product_shippable_id`)) DEFAULT CHARSET=utf8";
		
		$this->db->query($sql);
		
		// ms_order_product_shipping - table containing information about shipping for each order product
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_order_product_shipping` (
				`order_product_shipping_id` int(11) NOT NULL AUTO_INCREMENT,
				`shipping_method_name` VARCHAR(32) NOT NULL DEFAULT '',
				`shipping_cost` DECIMAL(15,4) NOT NULL,
				`product_id` int(11) NOT NULL,
				`order_id` int(11) NOT NULL,
				`seller_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`order_product_shipping_id`)) DEFAULT CHARSET=utf8";
			//`product_shipping_method_id` int(11) NOT NULL,
		
		$this->db->query($sql);
		
		// ms_order_seller_shipping - table containing information about shipping for each seller in order
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_order_seller_shipping` (
				`order_seller_shipping_id` int(11) NOT NULL AUTO_INCREMENT,
				`shipping_method_name` VARCHAR(32) NOT NULL DEFAULT '',
				`shipping_cost` DECIMAL(15,4) NOT NULL,
				`order_id` int(11) NOT NULL,
				`seller_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`order_seller_shipping_id`)) DEFAULT CHARSET=utf8";
			//`seller_shipping_method_id` int(11) NOT NULL,
		
		$this->db->query($sql);
		
		// ms_order_shipping_tracking - table containing information about order shipping - in particular tracking information
		$sql = "
			CREATE TABLE `" . DB_PREFIX . "ms_order_shipping_tracking` (
				`order_shipping_tracking_id` int(11) NOT NULL AUTO_INCREMENT,
				`shipped` tinyint(1) NOT NULL,
				`tracking_number` VARCHAR(32) NOT NULL DEFAULT '',
				`comment` TEXT DEFAULT '',
				`order_id` int(11) NOT NULL,
				`seller_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`order_shipping_tracking_id`)) DEFAULT CHARSET=utf8";
		
		$this->db->query($sql);
		
	}
	
	public function addData() {
		$this->db->query("INSERT INTO " . DB_PREFIX . "ms_version (version, distribution) VALUES('" . $this->MsLoader->version . "','" . $this->MsLoader->dist ."')");
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "ms_commission () VALUES()");
		$commission_id = $this->db->getLastId();
		
		// default fee rates
		foreach (array(MsCommission::RATE_SALE, MsCommission::RATE_SIGNUP, MsCommission::RATE_LISTING) as $type) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "ms_commission_rate` (rate_type, commission_id, flat, percent, payment_method) VALUES(" . $type . ", $commission_id, 0,0," . MsPayment::METHOD_BALANCE . ")");
		}		
		
		// default seller group fees
		$this->db->query("INSERT INTO " . DB_PREFIX . "ms_seller_group (commission_id) VALUES($commission_id)");
		$seller_group_id = $this->db->getLastId();
		
		// default seller group description
		$languages = $this->model_localisation_language->getLanguages();
		foreach ($languages as $code => $language) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "ms_seller_group_description SET seller_group_id = '" . (int)$seller_group_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Default', description = 'Default seller group'");
		}
		
		// SHIPPING
		// Insert default carrier and descriptions for it
		$this->db->query("INSERT INTO " . DB_PREFIX . "ms_shipping_method () VALUES()");
		$shipping_method_id = $this->db->getLastId();
		
		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		
		foreach ($languages as $code => $language) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "ms_shipping_method_description SET shipping_method_id = '" . (int)$shipping_method_id . "', language_id = '" . (int)$language['language_id'] . "', name = 'Default carrier', description = 'Default shipping carrier company (delete it)'");
		}
		
		// Permissions for Shipping Methods Area
		$this->load->model('user/user_group');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'multiseller/shipping-method');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'multiseller/shipping-method');
		
		// New model for calculating shipping totals
		$this->db->query("
			UPDATE `" . DB_PREFIX . "extension` SET code = 'ms_shipping'
			WHERE code = 'shipping'");
		
		$this->db->query("
			UPDATE `" . DB_PREFIX . "setting` SET `key` = 'ms_shipping_status'
			WHERE `key` = 'shipping_status'");
		
		// multimerch routes
		$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller Account'");
		$layout_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/account'");

		$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller List'");
		$layout_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/catalog-seller'");
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller Profile'");
		$layout_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/catalog-seller/profile'");

		$this->db->query("INSERT INTO " . DB_PREFIX . "layout SET name = 'MultiMerch Seller Products'");
		$layout_id = $this->db->getLastId();
		$this->db->query("INSERT INTO " . DB_PREFIX . "layout_route SET layout_id = '" . (int)$layout_id . "', route = 'seller/catalog-seller/products'");
	}

	public function dropTable() {
		$sql = "DROP TABLE IF EXISTS
				`" . DB_PREFIX . "ms_product`,
				`" . DB_PREFIX . "ms_seller`,
				`" . DB_PREFIX . "ms_rating`,
				`" . DB_PREFIX . "ms_order_product_data`,
				`" . DB_PREFIX . "ms_comments`,
				`" . DB_PREFIX . "ms_balance`,
				`" . DB_PREFIX . "ms_seller_group`,
				`" . DB_PREFIX . "ms_seller_group_description`,
				`" . DB_PREFIX . "ms_seller_group_criteria`,
				`" . DB_PREFIX . "ms_commission_rate`,
				`" . DB_PREFIX . "ms_commission`,
				`" . DB_PREFIX . "ms_criteria`,
				`" . DB_PREFIX . "ms_range_int`,
				`" . DB_PREFIX . "ms_range_decimal`,
				`" . DB_PREFIX . "ms_range_date`,
				`" . DB_PREFIX . "ms_attribute`,
				`" . DB_PREFIX . "ms_attribute_description`,
				`" . DB_PREFIX . "ms_attribute_value`,
				`" . DB_PREFIX . "ms_attribute_value_description`,
				`" . DB_PREFIX . "ms_attribute_attribute`,
				`" . DB_PREFIX . "ms_product_attribute`,
				`" . DB_PREFIX . "ms_payment`,
				`" . DB_PREFIX . "ms_badge`,
				`" . DB_PREFIX . "ms_badge_description`,
				`" . DB_PREFIX . "ms_badge_seller_group`,
				`" . DB_PREFIX . "ms_conversation`,
				`" . DB_PREFIX . "ms_message`,
				`" . DB_PREFIX . "ms_version`";
				
		$this->db->query($sql);
		
		// SHIPPING
		$sql = "
			DROP TABLE IF EXISTS
				`" . DB_PREFIX . "ms_product_shipping_method`,
				`" . DB_PREFIX . "ms_seller_shipping_method`,
				`" . DB_PREFIX . "ms_shipping_method_range`,
				`" . DB_PREFIX . "ms_shipping_method`,
				`" . DB_PREFIX . "ms_shipping_method_description`,
				`" . DB_PREFIX . "ms_order_shipping`,
				`" . DB_PREFIX . "ms_order_product_shippable`,
				`" . DB_PREFIX . "ms_order_product_shipping`,
				`" . DB_PREFIX . "ms_order_seller_shipping`,
				`" . DB_PREFIX . "ms_order_shipping_tracking`";
				
		$this->db->query($sql);
	}
	
	public function removeData() {
		/*$sql = "ALTER TABLE `" . DB_PREFIX . "ms_seller` 
				DROP COLUMN `shipping_type`";
		$this->db->query($sql);*/
		
		// Return old model for calculating shipping totals
		$this->db->query("
			UPDATE `" . DB_PREFIX . "extension` SET code = 'shipping'
			WHERE code = 'ms_shipping'");
			
		$this->db->query("
			UPDATE `" . DB_PREFIX . "setting` SET `key` = 'shipping_status'
			WHERE `key` = 'ms_shipping_status'");
	}
}