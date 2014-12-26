<?php
class ControllerModuleBossColumnFilter extends Controller {
	protected function index($setting) {
		
		$this->document->addScript('catalog/view/javascript/bossthemes/jquery.carouFredSel-6.2.0-packed.js');
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/boss_carousel.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/boss_carousel.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/boss_carousel.css');
		}
		
		static $module = 0;

		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		$this->load->language('module/boss_columnfilter');
		
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['view_more'] = $this->language->get('text_viewmore');
		
		if ($setting['label_image_width']) {
			$label_width = $setting['label_image_width'];
		} else {
			$label_width = 0;
		}
		
		if ($setting['label_image_height']) {
			$label_height = $setting['label_image_height'];
		} else {
			$label_height = 0;
		}
		
		if ($setting['image']) {
			$this->data['image'] = $this->model_tool_image->resize($setting['image'], $label_width, $label_height);
		} else {
			$this->data['image'] = false;
		}

		$results = array();
		$filter_type = $setting['filter_type'];
		switch($filter_type)
		{
		case "popular":
			$results = $this->model_catalog_product->getPopularProducts($setting['limit']);
			break;
		case "special":
			$data = array(
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => $setting['limit']
			);
			$results = $this->model_catalog_product->getProductSpecials($data);
			break;
		case "bestseller":
			$results = $this->model_catalog_product->getBestSellerProducts($setting['limit']);
			break;
		case "latest":
			$results = $this->model_catalog_product->getLatestProducts($setting['limit']);
			break;
		case "category":	
			$data = array(
			'filter_category_id' => $setting['filter_type_category'],
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => $setting['limit']
			);
			$results = $this->model_catalog_product->getProducts($data);
			break;
		}

		$this->data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		$this->data['products'] = array();
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
							
			$this->data['products'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
                'description' => mb_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}
		
		$this->data['module'] = $module++;
		$this->data['template'] = $this->config->get('config_template');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_columnfilter.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/boss_columnfilter.tpl';
		} else {
			$this->template = 'default/template/module/boss_columnfilter.tpl';
		}

		$this->render();
	}
}
?>