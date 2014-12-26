<?php
class ControllerModuleBossQuickSelect extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/boss_quickselect');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		
			$this->model_setting_setting->editSetting('boss_quickselect', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_header_top'] = $this->language->get('text_header_top');
		$this->data['text_header_bottom'] = $this->language->get('text_header_bottom');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
        $this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
        $this->data['text_alllayout'] = $this->language->get('text_alllayout');			
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');			
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
        $this->data['entry_block'] = $this->language->get('entry_block');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $this->data['entry_title'] = $this->language->get('entry_title');
		
		$this->data['text_name'] = $this->language->get('text_name');
		$this->data['text_category'] = $this->language->get('text_category');
		$this->data['text_icon'] = $this->language->get('text_icon');
		
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
		
		if (isset($this->error['image'])) {
			$this->data['error_image'] = $this->error['image'];
		} else {
			$this->data['error_image'] = array();
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
			'href'      => $this->url->link('module/boss_quickselect', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/boss_quickselect', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['token'] = $this->session->data['token'];
        
        $this->load->model('catalog/category');
        
        $this->data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {

			$this->data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name']
			);	
		}
		
		// image
		$this->load->model('tool/image');
		
		$category_lists = array();
		
		if (isset($this->request->post['category_lists'])) {
			$category_lists = $this->request->post['category_lists'];
		} elseif ($this->config->get('category_lists')) { 
			$category_lists = $this->config->get('category_lists');
		}	
		
		$this->data['iconcates'] = array();
		
		foreach ($category_lists as $category_list) {
			if ($category_list['icon'] && file_exists(DIR_IMAGE . $category_list['icon'])) {
				$icon = $category_list['icon'];
			} else {
				$icon = 'no_image.jpg';
			}			
			
			$this->data['iconcates'][] = array(
				'description'	 			=> $category_list['description'],
				'category_id'               => $category_list['category_id'],
                'image_width'               => $category_list['image_width'],
                'image_height'              => $category_list['image_height'],
				'icon'                      => $icon,
				'thumb'                     => $this->model_tool_image->resize($icon, 50, 50)
			);	
		} 
		
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);		

		//module		
		$this->data['modules'] = array();
		
		if (isset($this->request->post['boss_quickselect_module'])) {
			$this->data['modules'] = $this->request->post['boss_quickselect_module'];
		} elseif ($this->config->get('boss_quickselect_module')) { 
			$this->data['modules'] = $this->config->get('boss_quickselect_module');
		}					
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->template = 'module/boss_quickselect.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);		
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/boss_quickselect')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['category_lists'])) {
			foreach ($this->request->post['category_lists'] as $key => $value) {
				if (!$value['image_width'] || !$value['image_height']) {
					$this->error['image'][$key] = $this->language->get('error_image');
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
	
	//boss_homefilter
	public function install() 
	{
		$this->load->model('setting/setting');
		
		$this->load->model('localisation/language');
		
		$languages = $this->model_localisation_language->getLanguages();
		
		$array_title0 = array();
		
		foreach($languages as $language){
			$array_title0{$language['language_id']} = 'Shop by Department';
			$array_description0{$language['language_id']} = 'desktops';
			$array_description1{$language['language_id']} = 'test 15';
			$array_description2{$language['language_id']} = 'printers';
			$array_description3{$language['language_id']} = 'Scanners';
			$array_description4{$language['language_id']} = 'Cameras';
			$array_description5{$language['language_id']} = 'Mac';
			$array_description6{$language['language_id']} = 'PC';
			$array_description7{$language['language_id']} = 'Notebooks';
			$array_description8{$language['language_id']} = 'Mp3 Players';
		}
		
		$boss_quickselect = array(
		'category_lists' => array( 
			0 => Array ('description' => $array_description0, 'category_id' => 20, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_1.png'),
			1 => Array ('description' => $array_description1, 'category_id' => 47, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_2.png'),
			2 => Array ('description' => $array_description2, 'category_id' => 30, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_3.png'),
			3 => Array ('description' => $array_description3, 'category_id' => 31, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_4.png'),
			4 => Array ('description' => $array_description4, 'category_id' => 33, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_5.png'),
			5 => Array ('description' => $array_description5, 'category_id' => 27, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_6.png'),
			6 => Array ('description' => $array_description6, 'category_id' => 26, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_7.png'),
			7 => Array ('description' => $array_description7, 'category_id' => 18, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_8.png'),
			8 => Array ('description' => $array_description8, 'category_id' => 34, 'image_width' => 30, 'image_height' => 22, 'icon' => 'data/bt_gomarket/shopby_9.png')
		),
		'boss_quickselect_module' => array ( 
			0 => Array ( 'title' => $array_title0, 'block' => $array_title1, 'layout_id' => 0, 'position' => 'header_top', 'status'  => 1, 'sort_order' => 1 )
		));
		$this->model_setting_setting->editSetting('boss_quickselect', $boss_quickselect);		
	}
}
?>