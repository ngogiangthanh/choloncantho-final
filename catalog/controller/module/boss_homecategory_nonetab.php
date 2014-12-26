<?php
class ControllerModuleBossHomecategoryNonetab extends Controller {
    protected function index($setting) {
        
		$this->document->addScript('catalog/view/javascript/bossthemes/jquery.carouFredSel-6.2.0-packed.js');
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/boss_carousel.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/boss_carousel.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/boss_carousel.css');
		}
		
		static $module = 0;
		
		$this->data['template'] = $this->config->get('config_template');
		
		$this->load->model('catalog/product');
		$this->load->model('catalog/category');
		$this->load->model('tool/image');
		
		$this->load->model('design/banner');
		
		$category_id = $setting['category_id'];
		$this->data['modules'] = array();
		if (isset($category_id)) {
			$catagory_name = $this->model_catalog_category->getCategory($category_id);
			$data = array(
				'filter_category_id' => $category_id,
				'start' => 0,
				'limit' => $setting['limit']
			);
			
			$results = $this->model_catalog_product->getProducts($data);
			$products = array();
			foreach($results as $result){
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
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
					'description'=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
					'price'   	 => $price,
					'special' 	 => $special,
					'rating'     => $rating,
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
				);
			}
			
			//banner
			$banners = array();
			$results = $this->model_design_banner->getBanner($setting['banner_id']);			  
			foreach ($results as $result) {
				if (file_exists(DIR_IMAGE . $result['image'])) {
					$banners[] = array(
						'title' => $result['title'],
						'link'  => $result['link'],
						'image' => $this->model_tool_image->resize($result['image'], $setting['width_banner'], $setting['height_banner'])
					);
				}
			}
			
			$this->data['modules'] = array(
				'name' => $catagory_name['name'],
				'banners' => $banners,
				'products' => $products
			);	
		}
		
		$this->data['module'] = $module++; 
       
	    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_homecategory_nonetab.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/module/boss_homecategory_nonetab.tpl';
        } else {
            $this->template = 'default/template/module/boss_homecategory_nonetab.tpl';
        }

        $this->render();
    }
}

?>