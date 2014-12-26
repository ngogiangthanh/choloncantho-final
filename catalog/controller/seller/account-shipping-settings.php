<?php
class ControllerSellerAccountShippingSettings extends ControllerSellerAccount {
	public function __construct($registry) {
		parent::__construct($registry);

		$this->data = array_merge($this->data, $this->load->language('multiseller/multiseller_physical'));
	}
	
	public function index() {
		$this->document->addScript('catalog/view/javascript/account-shipping-settings.js');
		
		$seller_id = $this->customer->getId();
		
		$this->data['weight_classes'] = $this->MsLoader->MsShipping->getWeightClasses();
		//$this->load->model('localisation/currency');
		//$this->data['currencies'] = $this->model_localisation_currency->getCurrencies();
		$this->data['geo_zones'] = $this->MsLoader->MsShipping->getGeoZones();
		
		$this->data['currency_left'] = $this->currency->getSymbolLeft();
		$this->data['currency_right'] = $this->currency->getSymbolRight();
		
		$this->data['shipping_methods'] = $this->MsLoader->MsShippingMethod->getShippingMethods();
		
		$decimal_place = 2;
      	$decimal_point = $this->language->get('decimal_point');
      	$thousand_point = $this->language->get('thousand_point');
		
		$this->data['shipping_type'] = $this->MsLoader->MsShipping->getSellerShippingType($seller_id);
		if (empty($this->data['shipping_type'])) {
			$this->data['shipping_type'] = MsShipping::SHIPPING_TYPE_FIXED;
		}
		
		$ms_shipping_methods = $this->MsLoader->MsShipping->getSellerShippingMethods($seller_id);
		$this->data['ms_shipping_methods'] = array();
		
		if (!empty($ms_shipping_methods)) {
			foreach($ms_shipping_methods as $ms_shipping_method) {
				//$currency_decimal_place = $this->data['currencies'][$ms_shipping_method['currency_code']]['decimal_place'];
				//$ms_shipping_method['cost_per_unit'] = number_format(round($ms_shipping_method['cost_per_unit'], (int)$currency_decimal_place), (int)$currency_decimal_place, $decimal_point, $thousand_point);
				$ms_shipping_method['cost_per_unit'] = $this->currency->format($ms_shipping_method['cost_per_unit'], $this->config->get('config_currency'), '', FALSE);
				$ms_shipping_method['weight_step'] = number_format(round($ms_shipping_method['weight_step'], (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);
				$this->data['ms_shipping_methods'][] = $ms_shipping_method;
			}
		}
		
		$this->document->setTitle($this->language->get('ms_account_shipping_settings'));
		
		$this->data['breadcrumbs'] = $this->MsLoader->MsHelper->setBreadcrumbs(array(
			array(
				'text' => $this->language->get('text_account'),
				'href' => $this->url->link('account/account', '', 'SSL'),
			),
			array(
				'text' => $this->language->get('ms_account_shipping_settings_breadcrumbs'),
				'href' => $this->url->link('seller/account-shipping-settings', '', 'SSL'),
			)
		));
		
		$this->data['back'] = $this->url->link('account/account', '', 'SSL');;
		
		list($this->template, $this->children) = $this->MsLoader->MsHelper->loadTemplate('account-shipping-settings');
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	public function jxSubmitSettings() {
		$data = $this->request->post;
		
		$data['seller_id'] = $this->customer->getId();
		$json = array();
		
		$i = 0;
		$default = 0;
		
		// Delete sample row
		unset($data['ms_shipping_methods'][0]);
		
		// Continue only if combinable shipping is selected
		if ( $data['shipping_type'] == MsShipping::SHIPPING_TYPE_COMBINABLE ) {
			if (isset($data['ms_shipping_methods']) && is_array($data['ms_shipping_methods'])) {
				$ms_shipping_methods = $data['ms_shipping_methods'];
				foreach ($ms_shipping_methods as $ms_shipping_method) {
					// Check costs for errors
					if ((!is_numeric($ms_shipping_method['cost_per_unit'])) || ((float)$ms_shipping_method['cost_per_unit'] < (float)0)) {
						$json['errors']['shipping_methods_cost'] = $this->language->get('ms_error_invalid_shipping_cost');
					}
					// Check weights for errors
					if ((!is_numeric($ms_shipping_method['cost_per_unit'])) || ((float)$ms_shipping_method['cost_per_unit'] < (float)0)) {
						$json['errors']['shipping_methods_weight'] = $this->language->get('ms_error_invalid_shipping_weight');
					}
				}
			}
		}
		// If combinable shipping is not selected (or unselected), delete the shipping methods specified
		else {
			unset($data['ms_shipping_methods']);
		}
		
		// If there are no errors, continue and save settings
		if (empty($json['errors'])) {
			$this->MsLoader->MsShipping->editSellerShippingSettings($data);
			$this->session->data['success'] = $this->language->get('ms_success_shipping_settings_saved');
			$json['redirect'] = $this->url->link('seller/account-shipping-settings', '', 'SSL');
		}

		$this->response->setOutput(json_encode($json));
	}
	
}
?>