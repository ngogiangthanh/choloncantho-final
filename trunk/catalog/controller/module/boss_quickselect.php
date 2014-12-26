<?php
class ControllerModuleBossQuickSelect extends Controller {
	protected function index($setting) {
		static $module = 0;
		
		$this->data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		
		// image		
		$this->load->model('tool/image');

		$this->data['iconcates'] = array();

		$category_lists = array();
		
		$category_lists = $this->config->get('category_lists');
        
        $this->load->model('catalog/category');

		$this->data['categories'] = array();
	
		foreach ($category_lists as $category_list) {
		      if ($category_list['icon'] && file_exists(DIR_IMAGE . $category_list['icon'])) {
                $cate_name = $this->model_catalog_category->getCategory($category_list['category_id']);
				$icon = $category_list['icon'];
				$this->data['iconcates'][] = array(
                    'cate_name' => $cate_name['name'],
					'name'	 => html_entity_decode($category_list['description'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
					'href'        => $this->url->link('product/category', 'path=' . $category_list['category_id']),		
					'icon' 		 => $this->model_tool_image->resize($icon, $category_list['image_width'], $category_list['image_height'])
				);
              }	
		} 
		
		$this->data['module'] = $module++;
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_quickselect.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/boss_quickselect.tpl';
		} else {
			$this->template = 'default/template/module/boss_quickselect.tpl';
		}

		$this->render();
	}
}
?>