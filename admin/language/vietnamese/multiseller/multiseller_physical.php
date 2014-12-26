<?php

// General
$_['text_no_results'] = 'Không kết quả';
$_['text_success'] = 'Thành công';

$_['error_permission'] = 'Cảnh báo: Bạn không được phép chỉnh sửa!';

// Menu items
$_['ms_menu_shipping_methods'] = 'Phương thức giao hàng';

// Settings
$_['ms_config_download_limit_applies'] = 'Áp dụng những giới hạn download cho sản phẩm';
$_['ms_config_download_limit_applies_note'] = 'Chọn "tất cả sản phẩm" để áp dụng những giới hạn download lên tất cả sản phẩm mới được tạo ra bởi người bán. chọn "chỉ những sản phẩm kỹ thuật số" để áp dụng giới hạn này lên những sản phẩm kỹ thuật số.';
$_['ms_config_download_limit_applies_all'] = 'Tất cả sản phẩm';
$_['ms_config_download_limit_applies_digital'] = 'Chỉ sản phẩm kỷ thuật số';

// Settings shipping tab
$_['ms_tab_shipping'] = 'Giao hàng';
$_['ms_config_enable_product_shipping_cost_estimation'] = 'Cho phép ước lượng chi phí giao hàng trang sản phẩm';
$_['ms_config_enable_product_shipping_cost_estimation_note'] = 'Thiết lập này cho phép ước lượng chi phí giao hàng trong sản phẩm.';
$_['ms_config_enable_minicart_shipping_estimate'] = 'Cho phép ước lượng chi phí chuyển hàng';
$_['ms_config_enable_minicart_shipping_estimate_note'] = 'Thiết lập này cho phép ước lượng chi phí giao hàng trong giỏ hàng. Ướng lượng là gần đúng, bởi vì địa chỉ giao hàng không rõ và khách hàng vẫn chưa chọn phương thức giao hàng.';

// Catalog - Shipping methods
$_['ms_catalog_shipping_methods_heading'] = 'Phương thức giao hàng';
$_['ms_catalog_shipping_methods_breadcrumbs'] = 'Phương thức giao hàng';

$_['ms_shipping_methods_column_id'] = 'ID';
$_['ms_shipping_methods_column_name'] = 'Tên';
$_['ms_shipping_methods_column_action'] = 'Hoạt động';

$_['ms_catalog_insert_shipping_method_heading'] = 'Phương thức giao hàng mới';
$_['ms_catalog_edit_shipping_method_heading'] = 'Điều chỉnh phương thức giao hàng';

$_['ms_shipping_method_entry_name'] = 'Tên';
$_['ms_shipping_method_entry_description'] = 'Mô tả';
$_['ms_shipping_method_entry_language'] = 'Ngôn ngữ';

$_['ms_error_shipping_method_name'] = 'Lỗi: Tên phải có độ dài từ 3 đến 32 ký tự';
$_['ms_error_shipping_method_language'] = 'Lỗi: Ngôn ngữ vẫn chưa được chọn';

$_['ms_error_shipping_methods_exist'] = 'Lỗi: Sản phẩm/Bán hàng những phương thức giao hàng sử dụng phương thức này đã có trong cơ sở dữ liệu';

// Transactions
$_['ms_transaction_shipping'] = 'Chi phí giao hàng cho %s';
$_['ms_transaction_shipping_order'] = 'Chi phí giao hàng cho %s khác, người bán hàng %s';
$_['ms_transaction_shipping_refund'] = 'Hoàn trả lại hàng: %s';
$_['ms_transaction_shipping_refund_order'] = 'Trả hàng cho %s khác, Người bán hàng %s';

// Mail - product bought
$_['ms_mail_product_purchased_physical'] = <<<EOT
Sản phẩm của bạn được mua bởi %s.
Khách hàng: %s (%s)
Sản phẩm:
%s
EOT;

$_['ms_mail_product_purchased_physical_no_email'] = <<<EOT
Sản phẩm của bạn được mua bởi %s.
Khách hàng: %s
Sản phẩm:
%s
EOT;

$_['ms_mail_product_shipping_info_fixed'] = <<<EOT
Giao hàng: %s (%s)
EOT;

$_['ms_mail_product_total_price'] = <<<EOT
\n
Tổng tiền: %s
EOT;

$_['ms_mail_total_price_with_shipping'] = <<<EOT
\n
Tổng: %s
EOT;

$_['ms_mail_product_shipping_method'] = <<<EOT
\n
Phương thức giao hàng: %s
EOT;

$_['ms_mail_product_total_shipping'] = <<<EOT
\n
Tổng chi phí giao hàng: %s
EOT;

$_['ms_mail_product_total'] = <<<EOT
\n
Tổng: %s
EOT;


?>