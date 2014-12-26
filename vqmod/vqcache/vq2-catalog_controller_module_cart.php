<?php 
class ControllerModuleCart extends Controller {
	public function index() {

				$this->data = array_merge($this->data, $this->load->language('multiseller/multiseller_physical'));
			
		$this->language->load('module/cart');
		
      	if (isset($this->request->get['remove'])) {
          	$this->cart->remove($this->request->get['remove']);
			
			unset($this->session->data['vouchers'][$this->request->get['remove']]);
      	}	
			
		// Totals
		$this->load->model('setting/extension');
		
		$total_data = array();					
		$total = 0;
		$taxes = $this->cart->getTaxes();
		
		// Display prices
		if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
			$sort_order = array(); 
			
			$results = $this->model_setting_extension->getExtensions('total');
			
			foreach ($results as $key => $value) {
				$sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
			}
			
			array_multisort($sort_order, SORT_ASC, $results);
			
			foreach ($results as $result) {

				if ($result['code'] != "ms_shipping") {
			
				if ($this->config->get($result['code'] . '_status')) {
					$this->load->model('total/' . $result['code']);
		
					$this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
				}
				
				$sort_order = array(); 
			  
				foreach ($total_data as $key => $value) {
					$sort_order[$key] = $value['sort_order'];
				}
	
				array_multisort($sort_order, SORT_ASC, $total_data);			

				}
			
			}		
		}
		
		$this->data['totals'] = $total_data;
		
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_items'] = sprintf($this->language->get('text_items'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total));
		$this->data['text_empty'] = $this->language->get('text_empty');
		$this->data['text_cart'] = $this->language->get('text_cart');
		$this->data['text_checkout'] = $this->language->get('text_checkout');
		
		$this->data['button_remove'] = $this->language->get('button_remove');
		
		$this->load->model('tool/image');
		
		$this->data['products'] = array();
			

				$low_border = 0.0;
				$high_border = 0.0;
				$total_weight = 0.0;
				$weight_class = 1;
				$sellers = array();
			
		foreach ($this->cart->getProducts() as $product) {

				if ($product['shipping'] && $this->config->get('msconf_enable_minicart_shipping_estimate')) {
					$seller_id = $this->MsLoader->MsProduct->getSellerId($product['product_id']);
					$shipping_type = $this->MsLoader->MsShipping->getSellerShippingType($seller_id);
					// Fixed Shipping
					if ($shipping_type == MsShipping::SHIPPING_TYPE_FIXED) {
						$productShippingMethods = $this->MsLoader->MsShipping->getProductShippingMethods($product['product_id']);
						
						if (!empty($productShippingMethods)) {
							//$min = $this->currency->convert($productShippingMethods[0]['cost'] * $product['quantity'], $productShippingMethods[0]['currency_code'], $this->currency->getCode());
							$min = $productShippingMethods[0]['cost'] * $product['quantity'];
							$max = 0;
							foreach ($productShippingMethods as $productShippingMethod) {
								//if ($this->currency->convert($productShippingMethod['cost'] * $product['quantity'], $productShippingMethod['currency_code'], $this->currency->getCode()) > $max) {
								if ($productShippingMethod['cost'] * $product['quantity'] > $max) {
									//$max = $this->currency->convert($productShippingMethod['cost'] * $product['quantity'], $productShippingMethod['currency_code'], $this->currency->getCode());
									$max = $productShippingMethod['cost'] * $product['quantity'];
								}
								//if ($this->currency->convert($productShippingMethod['cost'] * $product['quantity'], $productShippingMethod['currency_code'], $this->currency->getCode()) < $min) {
								if ($productShippingMethod['cost'] * $product['quantity'] < $min) {
									//$min = $this->currency->convert($productShippingMethod['cost'] * $product['quantity'], $productShippingMethod['currency_code'], $this->currency->getCode());
									$min = $productShippingMethod['cost'] * $product['quantity'];
								}
							}
							$low_border += $min;
							$high_border += $max;
						}
					}
					//Combined shipping
					else if ($shipping_type == MsShipping::SHIPPING_TYPE_COMBINABLE) {
						if (!isset($sellers[$seller_id])){
							$sellers[$seller_id] = array (
								'seller_id' => $seller_id,
								'total_weight' => $this->weight->convert($product['weight'], $product['weight_class_id'], $weight_class),
								'weight_class_id' => $weight_class
							);
						} else {
							$sellers[$seller_id]['total_weight'] += $this->weight->convert($product['weight'], $product['weight_class_id'], $weight_class);
						}
					}
				}

			
			if ($product['image']) {
				$image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_cart_width'), $this->config->get('config_image_cart_height'));
			} else {
				$image = '';
			}
							
			$option_data = array();
			
			foreach ($product['option'] as $option) {
				if ($option['type'] != 'file') {
					$value = $option['option_value'];	
				} else {
					$filename = $this->encryption->decrypt($option['option_value']);
					
					$value = utf8_substr($filename, 0, utf8_strrpos($filename, '.'));
				}				
				
				$option_data[] = array(								   
					'name'  => $option['name'],
					'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value),
					'type'  => $option['type']
				);
			}
			
			// Display prices
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}
			
			// Display prices
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$total = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity']);
			} else {
				$total = false;
			}
													
			$this->data['products'][] = array(

				'product_id' => $product['product_id'],
			
				'key'      => $product['key'],
				'thumb'    => $image,
				'name'     => $product['name'],
				'model'    => $product['model'], 
				'option'   => $option_data,
				'quantity' => $product['quantity'],
				'price'    => $price,	
				'total'    => $total,	
				'href'     => $this->url->link('product/product', 'product_id=' . $product['product_id'])		
			);
		}
		

				foreach ($sellers as $seller) {
					$sellerShippingMethods = $this->MsLoader->MsShipping->getSellerShippingMethods($seller['seller_id']);
					
					if (!empty($sellerShippingMethods)) {
						// Take only full weight steps. Part-steps are rounded to the top
						$total_weight_units = ceil($this->weight->convert($seller['total_weight'], $seller['weight_class_id'], $weight_class) / $this->weight->convert((float)$sellerShippingMethods[0]['weight_step'], (int)$sellerShippingMethods[0]['weight_class_id'], $weight_class));
						//$min = $this->currency->convert($sellerShippingMethods[0]['cost_per_unit'] * $total_weight_units, $sellerShippingMethods[0]['currency_code'], $this->currency->getCode());
						$min = $sellerShippingMethods[0]['cost_per_unit'] * $total_weight_units;
						$max = 0;
						foreach ($sellerShippingMethods as $sellerShippingMethod) {
							$total_weight_units = ceil($this->weight->convert($seller['total_weight'], $seller['weight_class_id'], $weight_class) / $this->weight->convert((float)$sellerShippingMethod['weight_step'], (int)$sellerShippingMethod['weight_class_id'], $weight_class));
							//if ($this->currency->convert($sellerShippingMethod['cost_per_unit'] * $total_weight_units, $sellerShippingMethod['currency_code'], $this->currency->getCode()) > $max) {
							if ($sellerShippingMethod['cost_per_unit'] * $total_weight_units > $max) {
								//$max = $this->currency->convert($sellerShippingMethod['cost_per_unit'] * $total_weight_units, $sellerShippingMethod['currency_code'], $this->currency->getCode());
								$max = $sellerShippingMethod['cost_per_unit'] * $total_weight_units;
							}
							//if ($this->currency->convert($sellerShippingMethod['cost_per_unit'] * $total_weight_units, $sellerShippingMethod['currency_code'], $this->currency->getCode()) < $min) {
							if ($sellerShippingMethod['cost_per_unit'] * $total_weight_units < $min) {
								//$min = $this->currency->convert($sellerShippingMethod['cost_per_unit'] * $total_weight_units, $sellerShippingMethod['currency_code'], $this->currency->getCode());
								$min = $sellerShippingMethod['cost_per_unit'] * $total_weight_units;
							}
						}
						$low_border += $min;
						$high_border += $max;
					}
				}
			
		// Gift Voucher
		$this->data['vouchers'] = array();
		
		if (!empty($this->session->data['vouchers'])) {
			foreach ($this->session->data['vouchers'] as $key => $voucher) {
				$this->data['vouchers'][] = array(
					'key'         => $key,
					'description' => $voucher['description'],
					'amount'      => $this->currency->format($voucher['amount'])
				);
			}
		}
					

				if ($this->config->get('msconf_enable_minicart_shipping_estimate')) {
					$this->data['high_border'] = $high_border;
					$this->data['estimated_shipping'] = "";
					if ($low_border != $high_border) {
						//$this->data['estimated_shipping'] = $this->currency->format($low_border, $this->currency->getCode(), 1) . " - " . $this->currency->format($high_border, $this->currency->getCode(), 1);
						$this->data['estimated_shipping'] = $this->currency->format($low_border, $this->config->get('config_currency'), 1) . " - " . $this->currency->format($high_border, $this->config->get('config_currency'), 1);
					}
					else if ((float)$high_border != (float)0) {
						//$this->data['estimated_shipping'] = $this->currency->format($high_border, $this->currency->getCode(), 1);
						$this->data['estimated_shipping'] = $this->currency->format($high_border, $this->config->get('config_currency'), 1);
					}
				}
			
		$this->data['cart'] = $this->url->link('checkout/cart');
						
		$this->data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
	
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/cart.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/cart.tpl';
		} else {
			$this->template = 'default/template/module/cart.tpl';
		}
				
		$this->response->setOutput($this->render());		
	}
}
?>