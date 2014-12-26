<?php
class ControllerModuleBossHomecategoryTab extends Controller {
	protected function index($setting) {
		static $module = 0;

		$this->document->addScript('catalog/view/javascript/jquery/tabs.js');
		
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['template'] = $this->config->get('config_template');
		
		// tab
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		
		$this->data['tabs'] = array();
		
		$tabs = array();
		$tabs = $this->config->get('boss_homecategory_tab_tab');
		
		if (isset($tabs)) {
			foreach ($tabs as $tab) {
				$data = array(
					'filter_category_id' => $tab['category_id'],
					'sort'  => 'pd.name',
					'order' => 'ASC',
					'start' => 0,
					'limit' => $setting['limit']
				);
				
				$results = array();
				$results = $this->model_catalog_product->getProducts($data);
				
				$products = array();
				
				foreach ($results as $result) {
					if ($result['image']) {
						$image = $this->model_tool_image->resize($result['image'], $setting['image_width'], $setting['image_height']);
					} else {
						$image = false;
					}

					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
					} else {
						$price = false;
					}
							
					if ((float)$result['special']) { 
						$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
					} else {
						$special = false;
					}
					
					if ($this->config->get('config_review_status')) {
						$rating = $result['rating'];
					} else {
						$rating = false;
					}
					
					$products[] = array(
						'product_id' => $result['product_id'],
						'thumb'   	 => $image,
						'name'    	 => $result['name'],
						'price'   	 => $price,
						'special' 	 => $special,
						'rating'     => $rating,
						'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
						'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					);
				}
				
				if ($tab['image']) {
					$image = $this->model_tool_image->resize($tab['image'], $setting['image_category_width'], $setting['image_category_height']);
				} else {
					$image = false;
				}
				
				$catagory_name = $this->model_catalog_category->getCategory($tab['category_id']);
				
				$this->data['tabs'][] = array(
					'image' 		 => $image,
					'name'			 => $catagory_name['name'],
					'href'        => $this->url->link('product/category', 'path=' . $tab['category_id']),
					'title'	 		 =>	$tab['title'][$this->config->get('config_language_id')],
					'products'       => $products
				);
			}
		}
		// end tab
		
		$this->data['module'] = $module++;
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_homecategory_tab.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/boss_homecategory_tab.tpl';
		} else {
			$this->template = 'default/template/module/boss_homecategory_tab.tpl';
		}

		$this->render();
	}
}
?>