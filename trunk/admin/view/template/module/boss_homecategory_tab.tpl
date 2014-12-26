<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

        <!-- start tab -->  
        <table id="tab" class="list">
          <thead>
            <tr>
			  <td class="left">Tab</td>
              <td class="left" ><?php echo $tab_get_products_from; ?></td> 
			  <td class="left" style="width:15%"><?php echo $tab_image; ?></td>
			  <td class="left" style="width:45%"><?php echo $tab_title; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $tab_row = 0; ?>
          <?php foreach ($tabs as $tab) { ?>
          <tbody id="tab-row<?php echo $tab_row; ?>">
            <tr>	 
              <td class="left">Tab <b>#<?php echo $tab_row + 1; ?></b></td>
			  <td class="left"><select name="boss_homecategory_tab_tab[<?php echo $tab_row; ?>][category_id]">
				<?php foreach ($categories as $category) { ?>
					<?php if($category['category_id'] == $tab['category_id']){ ?>
						<option value="<?php echo $category['category_id']; ?>" selected="selected"><?php echo $category['name']; ?></option>
					<?php }else{ ?>
						<option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
					<?php } ?>
				<?php } ?>
			  </select></td>
			  <td class="left"><div class="image">
                  <img src="<?php echo $tab['thumb']; ?>" alt="" id="thumb<?php echo $tab_row; ?>" />
                  <input type="hidden" name="boss_homecategory_tab_tab[<?php echo $tab_row; ?>][image]" value="<?php echo $tab['image']; ?>" id="image<?php echo $tab_row; ?>"  />
                  <br />
                  <a onclick="image_upload('image<?php echo $tab_row; ?>', 'thumb<?php echo $tab_row; ?>');"><?php echo $text_browse; ?>
                  </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb<?php echo $tab_row; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image<?php echo $tab_row; ?>').attr('value', '');"><?php echo $text_clear; ?></a>
                </div></td>
			  <td class="left">
				<?php foreach ($languages as $language) { ?>
				  <input name="boss_homecategory_tab_tab[<?php echo $tab_row; ?>][title][<?php echo $language['language_id']; ?>]" value="<?php echo isset($tab['title'][$language['language_id']]) ? $tab['title'][$language['language_id']] : ''; ?>" size="80%"/>
				  <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
				<?php } ?></td>
              <td class="left"><a onclick="$('#tab-row<?php echo $tab_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
            </tr>
          </tbody>
          <?php $tab_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td class="left"><a onclick="addTab();" class="button"><?php echo $tab_add_tab; ?></a></td>
            </tr>
          </tfoot>
        </table>	 
        <!-- end tab --> 

        <table id="module" class="list">
          <thead>
            <tr>
			  <td class="left"><?php echo $entry_image_category; ?></td>
			  <td class="left"><?php echo $entry_image; ?></td>
			  <td class="left"><?php echo $entry_limit; ?></td>
              <td class="left"><?php echo $entry_layout; ?></td>
              <td class="left"><?php echo $entry_position; ?></td>
              <td class="left"><?php echo $entry_status; ?></td>
              <td class="right"><?php echo $entry_sort_order; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
			  <td class="left"><input type="text" name="boss_homecategory_tab_module[<?php echo $module_row; ?>][image_category_width]" value="<?php echo $module['image_category_width']; ?>" size="3" />
                <input type="text" name="boss_homecategory_tab_module[<?php echo $module_row; ?>][image_category_height]" value="<?php echo $module['image_category_height']; ?>" size="3" />
                <?php if (isset($error_category_image[$module_row])) { ?>
                <span class="error"><?php echo $error_category_image[$module_row]; ?></span>
                <?php } ?></td>
			  <td class="left"><input type="text" name="boss_homecategory_tab_module[<?php echo $module_row; ?>][image_width]" value="<?php echo $module['image_width']; ?>" size="3" />
                <input type="text" name="boss_homecategory_tab_module[<?php echo $module_row; ?>][image_height]" value="<?php echo $module['image_height']; ?>" size="3" />
                <?php if (isset($error_image[$module_row])) { ?>
                <span class="error"><?php echo $error_image[$module_row]; ?></span>
                <?php } ?></td>
              <td class="left"><input type="text" name="boss_homecategory_tab_module[<?php echo $module_row; ?>][limit]" value="<?php echo $module['limit']; ?>" size="3" />
			    <?php if (isset($error_numproduct[$module_row])) { ?>
                <span class="error"><?php echo $error_numproduct[$module_row]; ?></span>
                <?php } ?></td>
			  <td class="left"><select name="boss_homecategory_tab_module[<?php echo $module_row; ?>][layout_id]">
                  <?php foreach ($layouts as $layout) { ?>
                  <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="boss_homecategory_tab_module[<?php echo $module_row; ?>][position]">
                  <?php if ($module['position'] == 'content_top') { ?>
                  <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                  <?php } else { ?>
                  <option value="content_top"><?php echo $text_content_top; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'content_bottom') { ?>
                  <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                  <?php } else { ?>
                  <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="boss_homecategory_tab_module[<?php echo $module_row; ?>][status]">
                  <?php if ($module['status']) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              <td class="right"><input type="text" name="boss_homecategory_tab_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
              <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
            </tr>
          </tbody>
          <?php $module_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="7"></td>
              <td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
  <script type="text/javascript"><!--
    var tab_row = <?php echo $tab_row; ?>;

    function addTab() {
      html  = '<tbody id="tab-row' + tab_row + '">';
      html += '<tr>';
	  html += '<td class="left">Tab <b>#' + (tab_row+1) + '</b></td>';
	 html += '	 <td class="left"><select name="boss_homecategory_tab_tab['+ tab_row + '][category_id]">';
	  <?php foreach ($categories as $category) { ?>
	  html += '	   <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>';
	  <?php } ?>
	  html += '	 </select></td>';
	  html += '<td class="left"><div class="image"><img src="<?php echo $no_image; ?>" alt="" id="thumb' + tab_row + '" /><input type="hidden" name="boss_homecategory_tab_tab[' + tab_row + '][image]" value="" id="image' + tab_row + '" /><br /><a onclick="image_upload(\'image' + tab_row + '\', \'thumb' + tab_row + '\');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumb' + tab_row + '\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#image' + tab_row + '\').attr(\'value\', \'\');"><?php   echo $text_clear; ?></a></div></td>';
	 
	  html += '<td class="left">';
	  <?php foreach ($languages as $language) { ?>
		html += '<input name="boss_homecategory_tab_tab[' + tab_row + '][title][<?php echo $language['language_id']; ?>]"  size="80%"/>';
		html += '<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />';
	  <?php } ?>
	  html += '</td>';
	  
      html += '<td class="left"><a onclick="$(\'#tab-row' + tab_row  + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
      html += '</tr>';
      html += '</tbody>'; 
	
      $('#tab tfoot').before(html);
	  
      tab_row++;
    }
  //--></script>
  
	
  <script type="text/javascript"><!--
    var module_row = <?php echo $module_row; ?>;

    function addModule() {	
      html  = '<tbody id="module-row' + module_row + '">';
      html += '  <tr>';
	  html += '    <td class="left"><input type="text" name="boss_homecategory_tab_module[' + module_row + '][image_category_width]" value="80" size="3" /> <input type="text" name="boss_homecategory_tab_module[' + module_row + '][image_category_height]" value="80" size="3" /></td>';	
	  html += '    <td class="left"><input type="text" name="boss_homecategory_tab_module[' + module_row + '][image_width]" value="80" size="3" /> <input type="text" name="boss_homecategory_tab_module[' + module_row + '][image_height]" value="80" size="3" /></td>';	
	  html += '    <td class="left"><input type="text" name="boss_homecategory_tab_module[' + module_row + '][limit]" value="20" size="3" /></td>';
      html += '    <td class="left"><select name="boss_homecategory_tab_module[' + module_row + '][layout_id]">';
        <?php foreach ($layouts as $layout) { ?>
          html += '<option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
        <?php } ?>
      html += '    </select></td>';
      html += '    <td class="left"><select name="boss_homecategory_tab_module[' + module_row + '][position]">';
      html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
      html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
      html += '    </select></td>';
      html += '    <td class="left"><select name="boss_homecategory_tab_module[' + module_row + '][status]">';
      html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
      html += '      <option value="0"><?php echo $text_disabled; ?></option>';
      html += '    </select></td>';
      html += '    <td class="right"><input type="text" name="boss_homecategory_tab_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
      html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
      html += '  </tr>';
      html += '</tbody>';
	
      $('#module tfoot').before(html);
	
      module_row++;
    }
    //--></script> 

<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(data) {
						$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 700,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 
<?php echo $footer; ?>
