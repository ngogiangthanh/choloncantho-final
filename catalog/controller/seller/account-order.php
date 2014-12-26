<?php

class ControllerSellerAccountOrder extends ControllerSellerAccount {
public function getTableData() {
		$colMap = array(
			'customer_name' => 'firstname',
			'date_created' => 'o.date_added',
		);
		
		$sorts = array('order_id', 'customer_name', 'date_created', 'total_amount', 'tinh_trang');
		$filters = array_merge($sorts, array('products'));
		
		list($sortCol, $sortDir) = $this->MsLoader->MsHelper->getSortParams($sorts, $colMap);
		$filterParams = $this->MsLoader->MsHelper->getFilterParams($filters, $colMap);
		
		$seller_id = $this->customer->getId();
		$orders = $this->MsLoader->MsOrderData->getOrders(
			array(
				'seller_id' => $seller_id,
			),
			array(
				'order_by'  => $sortCol,
				'order_way' => $sortDir,
				'offset' => $this->request->get['iDisplayStart'],
				'limit' => $this->request->get['iDisplayLength'],
				'filters' => $filterParams
			),
			array(
				'total_amount' => 1,
				'products' => 1,
			)
		);
		
		$total_orders = isset($orders[0]) ? $orders[0]['total_rows'] : 0;

		$columns = array();
		foreach ($orders as $order) {
			$order_products = $this->MsLoader->MsOrderData->getOrderProducts(array('order_id' => $order['order_id'], 'seller_id' => $seller_id));

			// SE
			$total = 0.0;
			$sellerShipping = $this->MsLoader->MsShipping->getOrderSellerShipping($order['order_id'], $seller_id, 0);
		
			$shippings = array();
			$atLeastOneShippable = false;
			if (empty($sellerShipping)) {
				foreach ($order_products as $product) {
					// Shippable
					if ($this->MsLoader->MsShipping->getOrderProductShippable($order['order_id'], $product['product_id'])) {
						$atLeastOneShippable = true;
						$productShipping = $this->MsLoader->MsShipping->getOrderProductShipping($order['order_id'], $product['product_id'], 0);
						$shippings[] = array(
							'shipping_cost' => $productShipping['shipping_cost'],
							'name' => $productShipping['shipping_method_name']
							//'name' => $this->MsLoader->MsShippingMethod->getShippingMethodDescriptions($productShipping['product_shipping_method_id'])[$language_id]['name'],
						);
						$total += $productShipping['shipping_cost'];
					// Not shippable
					} else {
						$shippings[] = array(
							'shipping_cost' => "0",
							'name' => "--"
						);
					}
				}
			}
			else {
				foreach ($order_products as $product) {
					// Shippable
					if ($this->MsLoader->MsShipping->getOrderProductShippable($order['order_id'], $product['product_id'])) {
						$atLeastOneShippable = true;
					}
				}
				$shippings[] = array(
					'shipping_cost' => $sellerShipping['shipping_cost'],
					'name' => $sellerShipping['shipping_method_name']
					//'name' => $this->MsLoader->MsShippingMethod->getShippingMethodDescriptions($sellerShipping['seller_shipping_method_id'])[$language_id]['name'],
				);
				$total += $sellerShipping['shipping_cost'];
			}
		
			$shipped = 0;
			$orderShipping = $this->MsLoader->MsShipping->getOrderShippingTracking($order['order_id'], $seller_id);
			if ($orderShipping) {
				$shipped = $orderShipping['shipped']; // Is shipped already
			}

			// building shipping cell
			$shipping_data = "<td class='left products'>";
			foreach ($shippings as $shipping) {
				$shipping_data .= "<p>
					<span class='name'>{$shipping['name']}</span>
					<span class='total'>" . $this->currency->format($shipping['shipping_cost'], $this->config->get('config_currency')) . "</span>
				</p>";

			}

			if ($atLeastOneShippable) {
				if (!$shipped) {
					$shipping_data .= "<a href='index.php?route=seller/account-order/jxRenderMarkShippedDialog&order_id={$order['order_id']}&seller_id={$seller_id}&customer_id={$order['customer_id']}&initial=1' class='ms-markshipped' title='" . $this->language->get('ms_markshipped_title') . "'>" . $this->language->get('ms_markshipped_title') . "</a>";
				} else {
					$shipping_data .= "<a href='index.php?route=seller/account-order/jxRenderMarkShippedDialog&order_id={$order['order_id']}&seller_id={$seller_id}&customer_id={$order['customer_id']}&initial=0' class='ms-markshipped' title='" . $this->language->get('ms_edit_tracking') . "'>" . $this->language->get('ms_edit_tracking') . "</a>";
				}
			}

			$shipping_data .= "</td>";
			// << SE
			
			if ($this->config->get('msconf_hide_customer_email')) {
				$customer_name = "<a href='index.php?route=seller/account-order/jxRenderBuyerAddressDialog&order_id={$order['order_id']}&customer_id={$order['customer_id']}' class='ms-buyeraddress' title='" . $this->language->get('ms_buyeraddress_title') . "'>{$order['firstname']} {$order['lastname']}</a>";
			} else {
				$customer_name = "<a href='index.php?route=seller/account-order/jxRenderBuyerAddressDialog&order_id={$order['order_id']}&customer_id={$order['customer_id']}' class='ms-buyeraddress' title='" . $this->language->get('ms_buyeraddress_title') . "'>{$order['firstname']} {$order['lastname']}</a> ({$order['email']})";
			}
			
			$products = "";
			foreach ($order_products as $p) {
				$products .= "<p>";
					$products .= "<span class='name'>" . ($p['quantity'] > 1 ? "{$p['quantity']} x " : "") . "<a href='" . $this->url->link('product/product', 'product_id=' . $p['product_id'], 'SSL') . "'>{$p['name']}</a></span>";
					$products .= "<span class='total'>" . $this->currency->format($p['seller_net_amt'], $this->config->get('config_currency')) . "</span>";
				$products .= "</p>";
			}

			$tinh_trang = '<option value="Chưa chuyển hàng">Chưa chuyển hàng</option>
						   <option value="Đang chuyển hàng">Đang chuyển hàng</option>
						   <option value="Đã chuyển hàng">Đã chuyển hàng</option>';
			$giua = str_replace('<option value="'.$order['tinh_trang'].'">'.$order['tinh_trang'].'</option>','',$tinh_trang); 
			$tinh_trang =  '<select style="width:136px; color:red; font-size:12px" id=sl'.$order['order_id'].'><option style="color:blue" value="'.$order['tinh_trang'].'">'.$order['tinh_trang'].'</option>'.$giua.'
							</select>
							<input rel="capnhat"  onclick="cap_nhat('.$order['order_id'].')" type="button" class="button" value="Cập nhật" "/>';
			
			$columns[] = array_merge(
				$order,
				array(
					'order_id' => $order['order_id'],
					'customer_name' => $customer_name,
					'products' => $products,
					'date_created' => date($this->language->get('date_format_short'), strtotime($order['date_added'])),
					// SE
					'total_amount' => $this->currency->format($total + $order['total_amount'], $this->config->get('config_currency')),
					'shipping_data' => $shipping_data,
					'tinh_trang' => $tinh_trang,
				)
			);
		}
		
		$this->response->setOutput(json_encode(array(
			'iTotalRecords' => $total_orders,
			'iTotalDisplayRecords' => $total_orders,
			'aaData' => $columns
		)));
	}
		
	public function index() {
		// SE
		$this->document->addScript('catalog/view/javascript/dialog-buyeraddress.js');
 		$this->document->addScript('catalog/view/javascript/dialog-markshipped.js');
 		$this->data = array_merge($this->data, $this->load->language('multiseller/multiseller_physical'));

		$this->data['link_back'] = $this->url->link('account/account', '', 'SSL');
		
		$this->document->setTitle($this->language->get('ms_account_orders_heading'));
		
		$this->data['breadcrumbs'] = $this->MsLoader->MsHelper->setBreadcrumbs(array(
			array(
				'text' => $this->language->get('text_account'),
				'href' => $this->url->link('account/account', '', 'SSL'),
			),
			array(
				'text' => $this->language->get('ms_account_dashboard_breadcrumbs'),
				'href' => $this->url->link('seller/account-dashboard', '', 'SSL'),
			),			
			array(
				'text' => $this->language->get('ms_account_orders_breadcrumbs'),
				'href' => $this->url->link('seller/account-order', '', 'SSL'),
			)
		));
		
		list($this->template, $this->children) = $this->MsLoader->MsHelper->loadTemplate('account-order');
		$this->response->setOutput($this->render());
	}

	// Buyer address dialog
	public function jxRenderBuyerAddressDialog() {
		if (isset($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
		}
		if (isset($this->request->get['customer_id'])) {
			$customer_id = $this->request->get['customer_id'];
		}
  		
		if (!isset($order_id) || !isset($customer_id)) {
			return false;
		}
		
		$this->load->model('checkout/order');
		$this->data['order_info'] = $this->model_checkout_order->getOrder($order_id);
		
		list($this->template, $this->children) = $this->MsLoader->MsHelper->loadTemplate('dialog-buyeraddress');
		return $this->response->setOutput($this->render());
  	}
	
	// Mark shipped dialog
	public function jxRenderMarkShippedDialog() {
		if (isset($this->request->get['order_id'])) {
			$this->data['order_id'] = $this->request->get['order_id'];
		}
		if (isset($this->request->get['seller_id'])) {
			$this->data['seller_id'] = $this->request->get['seller_id'];
		}
		if (isset($this->request->get['customer_id'])) {
			$this->data['customer_id'] = $this->request->get['customer_id'];
		}
  		
		if (!isset($this->data['order_id']) || !isset($this->data['seller_id']) || !isset($this->data['customer_id'])) {
			return false;
		}
		
		$this->data['initial'] = $this->request->get['initial'];
		
		$orderShipping = $this->MsLoader->MsShipping->getOrderShippingTracking($this->request->get['order_id'], $this->request->get['seller_id']);
		if ($orderShipping) {
			$this->data['shipped'] = $orderShipping['shipped'];
			$this->data['tracking_number'] = $orderShipping['tracking_number'];
			$this->data['comment'] = $orderShipping['comment'];
		} else {
			$this->data['shipped'] = 0;
			$this->data['tracking_number'] = "";
			$this->data['comment'] = "";
		}
	
		list($this->template, $this->children) = $this->MsLoader->MsHelper->loadTemplate('dialog-markshipped');
		return $this->response->setOutput($this->render());
  	}
	
	// Submit mark shipped dialog
	public function jxSubmitMarkShippedDialog() {
  		if (!isset($this->request->post['order_id']) || !isset($this->request->post['seller_id']) || !isset($this->request->post['customer_id'])) {
  			return false;
		}

		$initial = $this->request->post['initial'];
		
		$data = array(
			'order_id' => $this->request->post['order_id'],
			'seller_id' => $this->request->post['seller_id'],
			'shipped' => (int)1,
    		'tracking_number' => trim($this->request->post['tracking_number']),
			'comment' => trim($this->request->post['comment'])
		);
		
		// Get customer e-mail address
		$this->load->model('account/customer');
		$customer_info = $this->model_account_customer->getCustomer($this->request->post['customer_id']);

		// Initial mark as shipped
		if ($initial) {
			$this->MsLoader->MsShipping->createOrderShippingTracking($data);
			$mail = array(
				'recipients' => $customer_info['email'],
				'addressee' => $customer_info['firstname'],
				'seller_id' => $data['seller_id'],
				'order_id' => $data['order_id']
			);
			$this->MsLoader->MsMail->sendMail(MsMail::SMT_MARK_SHIPPED, $mail);
		// Edit tracking information
		} else {
			$this->MsLoader->MsShipping->editOrderShippingTracking($data, $data['order_id'], $data['seller_id']);
			$mail = array(
				'recipients' => $customer_info['email'],
				'addressee' => $customer_info['firstname'],
				'seller_id' => $data['seller_id'],
				'order_id' => $data['order_id']
			);
			$this->MsLoader->MsMail->sendMail(MsMail::SMT_TRACKING_INFORMATION, $mail);
		}
  	}
	// ham in hoa don
	public function printBill() {
        if (isset($this->request->get['order_id'])) {
            $order_id = $this->request->get['order_id'];
        }
        if (!isset($order_id)) {
            return false;
        }
        $this->load->model('checkout/order');
        $this->data['order_info'] = $this->model_checkout_order->getOrder($order_id);
        $this->load->model('account/order');
        $this->data['product'] = array();
        $product_order = $this->model_account_order->getOrderProducts($order_id);
        foreach ($product_order as $product) {
            $this->data['product'][] = array(
                'name' => $product['name'],
                'model' => $product['model'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'total' => $product['total']
            );
        }
        //$this->data['order_product'] = $this->model_account_order->getOrderProducts($order_id);
        $this->template = 'default/template/multiseller/printBill.tpl';
        $this->response->setOutput($this->render());
    }
	public function capnhat() {	
		$ketqua ="chưa làm";
		if (isset($this->request->post['ids']) && isset($this->request->post['tts'])){
			$id= $this->request->post['ids'];
			$tt= $this->request->post['tts'];
			$this->load->model('account/order');
			$ketqua = $this->model_account_order->updateTT($id, $tt); 
			
		}	
		$tinh_trang = '<option value="Chưa chuyển hàng">Chưa chuyển hàng</option>
						   <option value="Đang chuyển hàng">Đang chuyển hàng</option>
						   <option value="Đã chuyển hàng">Đã chuyển hàng</option>';
		$giua = str_replace('<option value="'.$ketqua.'">'.$ketqua.'</option>', '' ,$tinh_trang); 
		$tinh_trang = '<option style="color:blue" value="'.$ketqua.'">'.$ketqua.'</option>'.$giua; 		   
		echo $tinh_trang;
	}
}

?>
