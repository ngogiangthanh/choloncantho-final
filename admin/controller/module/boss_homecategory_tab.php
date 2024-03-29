<?php
class ControllerModuleBossHomecategoryTab extends Controller {
	private $error = array(); 
	
	public function index() {   
	
		$this->load->language('module/boss_homecategory_tab');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		
			$this->model_setting_setting->editSetting('boss_homecategory_tab', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_home'] = $this->language->get('text_home');
 		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');			
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_image_category'] = $this->language->get('entry_image_category');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_use_scrolling_panel'] = $this->language->get('entry_use_scrolling_panel');
		$this->data['entry_tab'] = $this->language->get('entry_tab');
		
		$this->data['tab_add_tab'] = $this->language->get('tab_add_tab');
		$this->data['tab_title'] = $this->language->get('tab_title');
		$this->data['tab_image'] = $this->language->get('Image');
		$this->data['tab_get_products_from'] = $this->language->get('tab_get_products_from');
		$this->data['tab_popular_products'] = $this->language->get('tab_popular_products');
		$this->data['tab_special_products'] = $this->language->get('tab_special_products');
		$this->data['tab_best_seller_products'] = $this->language->get('tab_best_seller_products');
		$this->data['tab_latest_products'] = $this->language->get('tab_latest_products');
		$this->data['tab_choose_a_category'] = $this->language->get('tab_choose_a_category');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['button_add_image'] = $this->language->get('button_add_image');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		if (isset($this->error['category'])) {
			$this->data['error_category'] = $this->error['category'];
		} else {
			$this->data['error_category'] = array();
		}
		if (isset($this->error['numproduct'])) {
			$this->data['error_numproduct'] = $this->error['numproduct'];
		} else {
			$this->data['error_numproduct'] = array();
		}
		if (isset($this->error['image'])) {
			$this->data['error_image'] = $this->error['image'];
		} else {
			$this->data['error_image'] = array();
		}
		
		if (isset($this->error['category_image'])) {
			$this->data['error_category_image'] = $this->error['category_image'];
		} else {
			$this->data['error_category_image'] = array();
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/boss_homecategory_tab', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/boss_homecategory_tab', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['token'] = $this->session->data['token'];
	
		// tab
		$this->data['tabs'] = array();
		
		if (isset($this->request->post['boss_homecategory_tab_tab'])) {
			$tabs = $this->request->post['boss_homecategory_tab_tab'];
		} elseif ($this->config->get('boss_homecategory_tab_tab')) { 
			$tabs = $this->config->get('boss_homecategory_tab_tab');
		}	
	
		$this->load->model('tool/image');
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);	
	
		foreach ($tabs as $tab) {
			if ($tab['image']) {
				$image = $tab['image'];
			} else {
				$image = 'no_image.jpg';
			}		
			
			$this->data['tabs'][] = array(
				'category_id' => $tab['category_id'],
				'image'       => $image,
				'thumb'   	  => $this->model_tool_image->resize($image, 50, 50),
				'title'       => $tab['title']
			);
		}
		
			
		//module		
		$this->data['modules'] = array();
		
		if (isset($this->request->post['boss_homecategory_tab_module'])) {
			$this->data['modules'] = $this->request->post['boss_homecategory_tab_module'];
		} elseif ($this->config->get('boss_homecategory_tab_module')) { 
			$this->data['modules'] = $this->config->get('boss_homecategory_tab_module');
		}	
	
		$this->load->model('catalog/category');
		$this->data['categories'] = $this->model_catalog_category->getCategories(0);
		
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->template = 'module/boss_homecategory_tab.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);		
		$this->response->setOutput($this->render());
		
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/boss_homecategory_tab')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['boss_homecategory_tab_module'])) {
			foreach ($this->request->post['boss_homecategory_tab_module'] as $key => $value) {
				if (!$value['limit']) {
					$this->error['numproduct'][$key] = $this->language->get('error_numproduct');
				}
				if (!$value['image_width'] || !$value['image_height']) {
					$this->error['image'][$key] = $this->language->get('error_image');
				}
				if (!$value['image_category_width'] || !$value['image_category_height']) {
					$this->error['category_image'][$key] = $this->language->get('error_image');
				}
			}
		}
				
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
		
	private function getIdLayout($layout_name) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "layout WHERE LOWER(name) = LOWER('".$layout_name."')");
		return (int)$query->row['layout_id'];
	}
	
	public function install() 
	{
		$this->load->model('setting/setting');
		
		$this->load->model('localisation/language');
		
		$languages = $this->model_localisation_language->getLanguages();
		
		$array_title0 = array();
		$array_title1 = array();
		$array_title2  = array();		
		$array_title3  = array();		
		
		foreach($languages as $language){
			$array_title0{$language['language_id']} = 'Sed ullamcorper mattis metus sit amet facilisis. Praesent faucibus, magna uttter sodales';
			$array_title1{$language['language_id']} = 'Sed ullamcorper mattis metus sit amet facilisis. Praesent faucibus, magna uttter sodales';
			$array_title2{$language['language_id']} = 'Sed ullamcorper mattis metus sit amet facilisis. Praesent faucibus, magna uttter sodales';
			$array_title3{$language['language_id']} = 'Sed ullamcorper mattis metus sit amet facilisis. Praesent faucibus, magna uttter sodales';
		}
		
		$boss_homecategory_tab = array('boss_homecategory_tab_tab' => array ( 
			0 => array ('category_id' => 33, 'image' => 'data/bt_gomarket/12.jpg', 'title' => $array_title0),
			1 => array ('category_id' => 25, 'image' => 'data/bt_gomarket/10.jpg', 'title' => $array_title1),
			2 => array ('category_id' => 20, 'image' => 'data/bt_gomarket/16.jpg', 'title' => $array_title2),
			3 => array ('category_id' => 34, 'image' => 'data/bt_gomarket/11.jpg', 'title' => $array_title3)
		),'boss_homecategory_tab_module' => array ( 
			0 => array ('image_category_width' => 592, 'image_category_height' => 308, 'image_width' => 115, 'image_height' => 115, 'limit' => 3, 'layout_id' => $this->getIdLayout("home"), 'position' => 'content_top', 'status' => 1, 'sort_order' => 3))
		);

		$this->model_setting_setting->editSetting('boss_homecategory_tab', $boss_homecategory_tab);		
	}	
}
?>