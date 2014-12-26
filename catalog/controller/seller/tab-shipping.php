<?php
class ControllerSellerTabShipping extends ControllerSellerAccount {
	public function __construct($registry) {
		parent::__construct($registry);

		$this->data = array_merge($this->data, $this->load->language('multiseller/multiseller_physical'));
	}
	
	public function getForm() {
		$this->MsLoader->MsHelper->addStyle('multiseller_physical');
		
		$this->data['shipping_type'] = $this->MsLoader->MsShipping->getSellerShippingType($this->customer->getId());
		
		$product_id = $this->request->get['product_id'];
		$this->data['product_id'] = $product_id;
		
		$this->data['length_classes'] = $this->MsLoader->MsShipping->getLengthClasses();
		$this->data['weight_classes'] = $this->MsLoader->MsShipping->getWeightClasses();
		
		//$this->load->model('localisation/currency');
		//$this->data['currencies'] = $this->model_localisation_currency->getCurrencies();
		
		$this->data['currency_left'] = $this->currency->getSymbolLeft();
		$this->data['currency_right'] = $this->currency->getSymbolRight();
		
		$decimal_place = 2;
      	$decimal_point = $this->language->get('decimal_point');
      	$thousand_point = $this->language->get('thousand_point');
		
		$this->data['product'] = $this->MsLoader->MsShipping->getProductShippingData($product_id);
		if (empty($this->data['product'])) {
			$this->data['product'] = array();
			
			$this->data['product']['length'] = "";
			$this->data['product']['width'] = "";
			$this->data['product']['height'] = "";
			$this->data['product']['weight'] = "";
			$this->data['product']['weight_class_id'] = 0;
			$this->data['product']['length_class_id'] = 0;
		}
		else {
			$this->data['product']['length'] = number_format(round($this->data['product']['length'], (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);
			$this->data['product']['width'] = number_format(round($this->data['product']['width'], (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);
			$this->data['product']['height'] = number_format(round($this->data['product']['height'], (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);
			$this->data['product']['weight'] = number_format(round($this->data['product']['weight'], (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);
		}
		
		$ms_shipping_methods = $this->MsLoader->MsShipping->getProductShippingMethods($product_id);
		$this->data['ms_shipping_methods'] = array();
		
		if (!empty($ms_shipping_methods)) {
			foreach($ms_shipping_methods as $ms_shipping_method) {
				//$currency_decimal_place = $this->data['currencies'][$ms_shipping_method['currency_code']]['decimal_place'];
				//$ms_shipping_method['cost'] = number_format(round($ms_shipping_method['cost'], (int)$currency_decimal_place), (int)$currency_decimal_place, $decimal_point, $thousand_point);
				$ms_shipping_method['cost'] = $this->currency->format($ms_shipping_method['cost'], $this->config->get('config_currency'), '', FALSE);
				$this->data['ms_shipping_methods'][] = $ms_shipping_method;
			}
		}
		
		$this->data['shipping_methods'] = $this->MsLoader->MsShippingMethod->getShippingMethods();
		$this->data['geo_zones'] = $this->MsLoader->MsShipping->getGeoZones();
		
		$this->data['shipping_settings_link'] = $this->url->link('seller/account-shipping-settings', '', 'SSL');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/multiseller/account-product-form-shipping-tab.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/multiseller/account-product-form-shipping-tab.tpl';
		} else {
			$this->template = 'default/template/multiseller/account-product-form-shipping-tab.tpl';
		}
		
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
}
?>
