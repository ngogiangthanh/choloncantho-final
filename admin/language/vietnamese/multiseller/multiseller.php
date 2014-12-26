<?php

// General
$_['ms_enabled'] = 'Kích hoạt';
$_['ms_disabled'] = 'Vô hiệu hóa';
$_['ms_apply'] = 'Áp dụng';
$_['ms_type'] = 'Type';
$_['ms_type_checkbox'] = 'Checkbox';
$_['ms_type_date'] = 'Ngày';
$_['ms_type_datetime'] = 'Ngày &amp; Thời gian';
$_['ms_type_file'] = 'File';
$_['ms_type_image'] = 'Ảnh';
$_['ms_type_radio'] = 'Radio';
$_['ms_type_select'] = 'Chọn';
$_['ms_type_text'] = 'Text';
$_['ms_type_textarea'] = 'Textarea';
$_['ms_type_time'] = 'Thời gian';
$_['text_image_manager'] = 'Quản lý hình ảnh';
$_['text_browse'] = 'Duyệt';
$_['text_clear'] = 'Xóa';
$_['ms_id'] = '#';

$_['ms_error_directory'] = "Warning: Could not create directory: %s. Please create it manually and make it server-writable before proceeding. <br />";
$_['ms_error_directory_notwritable'] = "Warning: Directory already exists and is not writable: %s. Please make sure it's empty and make it server-writable before proceeding. <br />";
$_['ms_error_directory_exists'] = "Warning: Directory already exists: %s. Please make sure it's empty before proceeding. <br />";
$_['ms_error_ckeditor'] = "Warning: Failed to copy CKEditor files from %s to %s. Please do it manually if you intend to use it for seller profile and product forms <br />";
$_['ms_notice_ckeditor'] = "Notice: If you intend to use RTE (Rich Text Editor) for the seller profile and product forms, please manually copy CKEditor files from %s to %s. <br />";
$_['ms_error_product_publish'] = 'Failed to publish some products: seller account not active.';
$_['ms_success_installed'] = 'Extension successfully installed';
$_['ms_success_product_status'] = 'Successfully changed product status.';

$_['heading_title'] = '[ffct.cc] Thị trường kỹ thuật số MultiMerch';
$_['text_seller_select'] = 'Người bán chọn';
$_['text_shipping_dependent'] = 'Phụ thuộc vào vận chuyển';
$_['text_no_results'] = 'Không kết quả';
$_['error_permission'] = 'Cảnh báo: Bạn không được phép chỉnh sửa module!';

$_['ms_error_withdraw_norequests'] = 'Lỗi: không có hình thức thanh toán để xử lý';
$_['ms_error_withdraw_response'] = 'Lỗi: không phản hồi';
$_['ms_error_withdraw_status'] = 'Lỗi: giao dịch không thành công';
$_['ms_success'] = 'Thành công';
$_['ms_success_transactions'] = 'Giao dịch thành công';
$_['ms_success_payment_deleted'] = 'Đã xóa nợ';

$_['ms_none'] = 'None';
$_['ms_seller'] = 'Người bán';
$_['ms_all_sellers'] = 'Tất cả người bán';
$_['ms_amount'] = 'Số lượng';
$_['ms_product'] = 'Sản phẩm';
$_['ms_net_amount'] = 'Lợi nhuận ròng';
$_['ms_days'] = 'Ngày';
$_['ms_from'] = 'Từ';
$_['ms_to'] = 'Đến';
$_['ms_paypal'] = 'PayPal';
$_['ms_date_created'] = 'Ngày tạo';
$_['ms_status'] = 'Tình trạng';
$_['ms_image'] = 'Hình ảnh';
$_['ms_date_modified'] = 'Ngày sửa đổi';
$_['ms_date_paid'] = 'ngày thanh toán';
$_['ms_date'] = 'Ngày';
$_['ms_description'] = 'Mô tả';

$_['ms_commission'] = 'Hoa hồng';
$_['ms_commissions_fees'] = 'Hoa hồng và chi phí';
$_['ms_commission_' . MsCommission::RATE_SALE] = 'Chi phí bán hàng';
$_['ms_commission_' . MsCommission::RATE_LISTING] = 'lệ phí niêm yết / cách thức';
$_['ms_commission_' . MsCommission::RATE_SIGNUP] = 'Chi phí đăng kí/ cách thức';

$_['ms_commission_short_' . MsCommission::RATE_SALE] = 'S';
$_['ms_commission_short_' . MsCommission::RATE_LISTING] = 'L';
$_['ms_commission_short_' . MsCommission::RATE_SIGNUP] = 'SU';
$_['ms_commission_actual'] = 'Tỉ lệ chi phí thực tế';

$_['ms_sort_order'] = 'Sắp xếp thứ tự';
$_['ms_name'] = 'Tên';
$_['ms_description'] = 'Mô tả';

$_['ms_enable'] = 'Kích hoạt';
$_['ms_disable'] = 'Vô hiệu hóa';
$_['ms_edit'] = 'Chỉnh sửa';
$_['ms_delete'] = 'Xóa';

$_['ms_button_pay_masspay'] = 'Thanh toán thông qua MassPay';

// Menu
$_['ms_menu_multiseller'] = 'MultiMerch';
$_['ms_menu_sellers'] = 'Người bán';
$_['ms_menu_seller_groups'] = 'Nhóm người bán';
$_['ms_menu_attributes'] = 'Thuộc tính';
$_['ms_menu_products'] = 'Sản phẩm';
$_['ms_menu_transactions'] = 'Giao dịch';
$_['ms_menu_payment'] = 'Thanh toán';
$_['ms_menu_settings'] = 'Thiết lập';
$_['ms_menu_comments'] = 'Bình luận';
$_['ms_menu_badge'] = 'Huy hiệu';

// Settings
$_['ms_settings_heading'] = 'Thiết lập';
$_['ms_settings_breadcrumbs'] = 'Thiết lập';
$_['ms_config_seller_validation'] = 'Xác nhận người bán';
$_['ms_config_seller_validation_note'] = 'Xác nhận người bán';
$_['ms_config_seller_validation_none'] = 'Không xác nhận được';
$_['ms_config_seller_validation_activation'] = 'Kịch hoạt thông qua email';
$_['ms_config_seller_validation_approval'] = 'Hướng dẫn sử dụng chính thức';

$_['ms_config_product_validation'] = 'Xác nhận sản phẩm';
$_['ms_config_product_validation_note'] = 'Xác nhận sản phẩm';
$_['ms_config_product_validation_none'] = 'Không xác nhận được';
$_['ms_config_product_validation_approval'] = 'Hướng dẫn sử dụng chính thức';

$_['ms_config_disable_product_after_quantity_depleted'] = 'Vô hiệu hóa sản phẩm sau khi hết hàng';
$_['ms_config_disable_product_after_quantity_depleted_note'] = 'Sản phẩm sẽ bị vô hiệu hóa khi được bán hết';

$_['ms_config_allow_relisting'] = 'Cho phép làm lại danh sách sản phẩm bị vô hiệu hóa';
$_['ms_config_allow_relisting_note'] = 'Người bán có thể làm lại danh sách bị vô hiệu hóa (Sẽ hữu ích nếu bạn giới hạn sản phẩm bằng thời gian và số lượng kết hợp với phí niêm yết)';

$_['ms_config_enable_one_page_seller_registration'] = 'Trang đăng ký';
$_['ms_config_enable_one_page_seller_registration_note'] = 'Kích hoạt trang đăng ký cho người bán';

$_['ms_config_minmax_product_price'] = 'Giá sản phẩm nhỏ nhất và lớn nhất';
$_['ms_config_minimum_product_price'] = 'Nhỏ nhất';
$_['ms_config_maximum_product_price'] = 'Lớn nhất';
$_['ms_config_minmax_product_price_note'] = 'Giá sản phẩm lớn nhất và nhỏ nhất (0 có nghĩa là không giới hạn)';

$_['ms_config_allowed_image_types'] = 'Cho phép mở rộng hình ảnh';
$_['ms_config_allowed_image_types_note'] = 'Cho phép mở rộng hình ảnh';

$_['ms_config_images_limits'] = 'Giới hạn ảnh sản phẩm';
$_['ms_config_images_limits_note'] = 'Số lượng ảnh nhỏ nhất và lớn nhất(bao gồm cả thumbnail) yêu cầu/ cho phép của sản phẩm (0 = không giới hạn)';

$_['ms_config_downloads_limits'] = 'Giới hạn tải sản phẩm';
$_['ms_config_downloads_limits_note'] = 'Số lượng lần download nhỏ nhất và lớn nhất yêu cầu/ cho phép của sản phẩm (0 = không giới hạn)';

$_['ms_config_enable_pdf_generator'] = 'Kích hoạt chuyển đổi PDF sang hình ảnh';
$_['ms_config_enable_pdf_generator_note'] = 'Cho phép người bán chuyển đổi file PDF sang hình ảnh (yều cầu phải cài Imagick bản mở rộng PHP và Ghostscript)';

$_['ms_config_allowed_download_types'] = 'phần mở rộng cho phép tải về';
$_['ms_config_allowed_download_types_note'] = 'phần mở rộng cho phép tải về';

$_['ms_config_credit_order_statuses'] = 'Tình trạng vốn';
$_['ms_config_credit_order_statuses_note'] = 'Người bán sẽ được hỗ trợ vốn để cân bằng với tình trạng vốn';

$_['ms_config_debit_order_statuses'] = 'Trình trạng phí';
$_['ms_config_debit_order_statuses_note'] = 'Người bán sẽ được tính phí cho đơn đặt hàng để cân bằng với tình trạng phí';

$_['ms_config_minimum_withdrawal'] = 'Số tiền thanh toán tối thiểu';
$_['ms_config_minimum_withdrawal_note'] = 'Số dư tối thiểu cần thiết để yêu cầu thanh toán';

$_['ms_config_allow_partial_withdrawal'] = 'Cho phép thanh toán từng phần';
$_['ms_config_allow_partial_withdrawal_note'] = 'Cho phép người bán yêu cầu thanh toán từng phần';

$_['ms_config_allow_withdrawal_requests'] = 'Cho phép các yêu cầu thanh toán';
$_['ms_config_allow_withdrawal_requests_note'] = 'Cho phép người bán yêu cầu khoản thu';

$_['ms_config_paypal_sandbox'] = 'chế độ PayPal Sandbox';
$_['ms_config_paypal_sandbox_note'] = 'Sử sụng PayPal trong Sandbox để thử nghiêm và sửa lỗi';

$_['ms_config_paypal_address'] = 'Địa chỉ PayPal';
$_['ms_config_paypal_address_note'] = 'Địa chỉ PayPal của bạn cho phí niêm yết và đăng kí';

$_['ms_config_paypal_api_username'] = 'PayPal API username';
$_['ms_config_paypal_api_username_note'] = 'PayPal API username để thanh toán MassPay';

$_['ms_config_paypal_api_password'] = 'PayPal API password';
$_['ms_config_paypal_api_password_note'] = 'PayPal API password để thanh toán MassPay';

$_['ms_config_paypal_api_signature'] = 'PayPal API chữ ký';
$_['ms_config_paypal_api_signature_note'] = 'PayPal API chữ ký để thanh toán MassPay';

$_['ms_config_notification_email'] = 'email admin cho các thông báo';
$_['ms_config_notification_email_note'] = 'Địa chỉ email cho nhiều thư thông báo khác nhau';

$_['ms_config_allow_free_products'] = 'Cho phép sản phẩm miễn phí';
$_['ms_config_allow_free_products_note'] = 'Cho phép người bán đăng sản phẩm miễn phí';

$_['ms_config_allow_multiple_categories'] = 'Cho phép nhiều chuyên mục';
$_['ms_config_allow_multiple_categories_note'] = 'Cho phép người bán chèn sản phẩm vào nhiều chuyên mục';

$_['ms_config_additional_category_restrictions'] = 'Không cho phép số lượng lớn chuyên mục';
$_['ms_config_additional_category_restrictions_note'] = '<u>Không cho phép</u> người bán liệt kê sản phẩm trong chuyên mục đặc biệt';
$_['ms_topmost_categories'] = 'Mục trên cùng';
$_['ms_parent_categories'] = 'Tất cả chuyên mục cha';

$_['ms_config_restrict_categories'] = 'Loại chuyên mục không được phép';
$_['ms_config_restrict_categories_note'] = '<u>Không cho phép</u> người bán liệt kê sản phẩm trong các chuyên mục này';

$_['ms_config_product_included_fields'] = 'Bao gồm nhiều lĩnh vực cho các sản phẩm';
$_['ms_config_product_included_fields_note'] = 'Các lĩnh vực sẽ được add vào form của sản phẩm';

$_['ms_config_provide_buyerinfo'] = 'Thông tin mail của người mua';
$_['ms_config_provide_buyerinfo_note'] = 'Bao gồm địa chỉ email của người mua trong "sản phẩm đã mua"';

$_['ms_config_enable_shipping'] = 'Cho phép giao hàng';
$_['ms_config_enable_shipping_note'] = 'Sản phẩm mới được đăng lên để yêu cầu giao hàng';

$_['ms_config_enable_quantities'] = 'Kích hoạt số lượng sản phẩm';
$_['ms_config_enable_quantities_note'] = 'Cho phép người bán xác định số lượng sản phẩm';

$_['ms_config_seller_terms_page'] = 'Các điều khoản tài khoản của người bán';
$_['ms_config_seller_terms_page_note'] = 'Người bán phải đồng ý các điều khoản khi tạo tài khoản bán hàng.';

$_['ms_config_allow_specials'] = 'Cho phép giá đặc biệt';
$_['ms_config_allow_specials_note'] = 'Cho phép người bán đưa ra giá đặc biệt';

$_['ms_config_allow_discounts'] = 'Cho phép giảm giá theo số lượng';
$_['ms_config_allow_discounts_note'] = 'Cho phép người bán giảm giá theo số lượng';
 
$_['ms_config_withdrawal_waiting_period'] = 'Payout waiting period';
$_['ms_config_withdrawal_waiting_period_note'] = 'Seller balance entries newer than this value will not be available for payout requests';

$_['ms_config_product_comments'] = 'Bình luận sản phẩm';
$_['ms_config_comments_enable'] = 'Kích hoạt bình luận sản phẩm';
$_['ms_config_comments_enable_note'] = 'Kích hoạt hoạc vô hiệu hóa chức năng bình luận sản phẩm';

$_['ms_config_seller_comments'] = 'Bình luận người bán';
$_['ms_config_seller_comments_enable'] = 'Kích hoạt bình luận người bán';
$_['ms_config_seller_comments_enable_note'] = 'Kích hoạt hoặc vô hiệu hóa chức năng bình luận người bán';

$_['ms_config_comments_perpage'] = 'Số bình luận mỗi trang';
$_['ms_config_comments_perpage_note'] = 'Số lượng bình luận mỗi trang trong cửa hàng';

$_['ms_config_comments_allow_guests'] = 'Cho phép bình luận của khách';
$_['ms_config_comments_allow_guests_note'] = 'Cho phép bình luận khách viếng thăm';

$_['ms_config_comments_enforce_customer_data'] = 'Thực thi dữ liệu khách hàng';
$_['ms_config_comments_enforce_customer_data_note'] = 'Ngăn chặn khách hàng đã đăng ký sử dụng tên tùy chỉnh và email khi gửi bình luận';

$_['ms_config_comments_enable_customer_captcha'] = 'Sử dụng captcha cho khách hàng';
$_['ms_config_comments_enable_customer_captcha_note'] = 'Sử dụng captcha cho khách hàng đăng ký';

$_['ms_config_comments_maxlen'] = 'Độ dài tối đa bình luận';
$_['ms_config_comments_maxlen_note'] = 'Độ dài tối đa bình luận khi đăng bình luận trong cửa hàng';

$_['ms_config_graphical_sellermenu'] = 'Đồ họa menu người bán';
$_['ms_config_graphical_sellermenu_note'] = 'Đồ họa menu người bán';

$_['ms_config_carousel'] = 'Băng chuyền bán hàng';
$_['ms_config_topsellers'] = 'Người bán nhiều nhất';
$_['ms_config_modules'] = 'Modules';
$_['ms_config_productform'] = 'From sản phẩm';
$_['ms_config_finances'] = 'Tài chính';
$_['ms_config_newsellers'] = 'Người bán mới';
$_['ms_config_sellerdropdown'] = 'Người bán tuột hạng';
$_['ms_config_comments'] = 'Bình luận';
$_['ms_config_miscellaneous'] = 'Linh linh';

$_['ms_config_module'] = 'Modules';
$_['ms_config_status'] = 'Tình trạng';
$_['ms_config_top'] = 'Nội dung trên';
$_['ms_config_bottom'] = 'Nội dung dưới';
$_['ms_config_column_left'] = 'Cột trái';
$_['ms_config_column_right'] = 'Cột phải';
$_['ms_config_limit'] = 'Giới hạn:';
$_['ms_config_scroll'] = 'Thanh cuộn:';
$_['ms_config_image'] = 'Hình ảnh (W x H):';
$_['ms_config_layout'] = 'Layout:';
$_['ms_config_position'] = 'Vị trí:';
$_['ms_config_sort_order'] = 'Xếp theo thứ tự:';

$_['ms_config_enable_rte'] = 'Kích hoạt Rich Text Editor để trang trí';
$_['ms_config_enable_rte_note'] = 'Kích hoạt Rich Text Editor để người bán miêu tả sản phẩm theo các lĩnh vực. Để sử dụng chức năng này, bạn cần phải copy thư viện folder ckeditor javascript từ admin (admin/view/javascript) vào catalog (catalog/view/javascript/multimerch)';

$_['ms_config_rte_whitelist'] = 'Tag whitelist';
$_['ms_config_rte_whitelist_note'] = 'Cho phép tag trong RTE (empty = Cho phép tất cả tag)';

$_['ms_config_image_sizes'] = 'Kích thước ảnh';
$_['ms_config_seller_avatar_image_size'] = 'Kích thước ảnh người bán';
$_['ms_config_seller_avatar_image_size_seller_profile'] = 'Hồ sơ người bán';
$_['ms_config_seller_avatar_image_size_seller_list'] = 'Danh sách người bán';
$_['ms_config_seller_avatar_image_size_product_page'] = 'Trang sản phẩm';
$_['ms_config_seller_avatar_image_size_seller_dashboard'] = 'Trang tổng quát của người bán';

$_['ms_config_image_preview_size'] = 'Upload kích thước ảnh xem trước';
$_['ms_config_image_preview_size_seller_avatar'] = 'Avatar người bán';
$_['ms_config_image_preview_size_product_image'] = 'Ảnh sản phẩm';

$_['ms_config_product_image_size'] = 'Kích thước ảnh sản phẩm';
$_['ms_config_product_image_size_seller_profile'] = 'Hồ sơ người bán';
$_['ms_config_product_image_size_seller_products_list'] = 'Danh sách hồ sơ người bán';

$_['ms_config_badge_size'] = 'Badge size';

$_['ms_config_minimum_uploaded_image_size'] = 'Kích thước ảnh up lên tối thiểu (Width x Height)';
$_['ms_config_minimum_uploaded_image_size_note'] = 'Xác nhận kích thước ảnh tối thiểu cho phép tải lên. 0 = không giới hạn.';
$_['ms_config_maximum_uploaded_image_size'] = 'Kích thước ảnh up lên tối đa (Width x Height)';
$_['ms_config_maximum_uploaded_image_size_note'] = 'Xác nhận kích thước ảnh tối đa cho phép tải lên. 0 = không giới hạn.';

$_['ms_config_seo'] = 'SEO';
$_['ms_config_enable_seo_urls_seller'] = 'Tạo SEO URLs cho người bán mới';
$_['ms_config_enable_seo_urls_seller_note'] = 'Tùy chọn này sẽ tạo SEO-friendly URLs Cho người bán mới. SEO URLs phải được kích hoạt từ OpenCart.';
$_['ms_config_enable_seo_urls_product'] = 'Tạo SEO URLs cho sản phẩm mới (thử nghiệm)';
$_['ms_config_enable_seo_urls_product_note'] = 'Tùy chọn này sẽ tạo SEO-friendly URLs cho sản phẩm mới. SEO URLs phải được kích hoạt từ OpenCart. thử nghiệm, đặc biệt dành cho các cửa hàng không phải tiếng anh.';
$_['ms_config_enable_update_seo_urls'] = 'kích hoạt hệ SEO URLs để update sản phẩm';
$_['ms_config_enable_update_seo_urls_note'] = 'Tùy chọn này kích hoạt hệ SEO URLs mới, khi update một sản phẩm đã có trong cửa hàng.';
$_['ms_config_enable_non_alphanumeric_seo'] = 'Cho phép dùng mã UTF8 trong SEO URLs (thử nghiệm)';
$_['ms_config_enable_non_alphanumeric_seo_note'] = 'Đây không phải ký hiệu strip UTF8 của SEO URLs. Bạn phải tự chiệu trách nhiệm các rủi ro.';
$_['ms_config_sellers_slug'] = 'Người bán SEO keyword';
$_['ms_config_sellers_slug_note'] = 'Danh sách người bán SEO keyword (Chỉ dùng được khi SEO được kích hoạt)';

$_['ms_config_attributes'] = 'Thuộc tính';
$_['ms_config_attribute_display'] = 'Hiển thị thuộc tính';
$_['ms_config_attribute_display_note'] = 'Tinh chỉnh các thuộc tính được hiển thị trên trang sản phẩm';
$_['ms_config_attribute_display_mm'] = 'MultiMerch';
$_['ms_config_attribute_display_oc'] = 'OpenCart';
$_['ms_config_attribute_display_both'] = 'Cả hai';

$_['ms_config_privacy'] = 'Riêng tư';
$_['ms_config_enable_private_messaging'] = 'Kích hoạt hệ thống tin nhắn riêng tư';
$_['ms_config_enable_private_messaging_note'] = 'Kích hoạt hoặc vô hiêu hóa hệ thống tin nhắn riêng tư or hộp thoại liên lạc người bán';
$_['ms_config_pm_dialog_only'] = 'Chỉ có người bán mới có thể liên lạc qua hộp thoại email';

$_['ms_config_hide_customer_email'] = 'Ẩn địa chỉ email khách';
$_['ms_config_hide_customer_email_note'] = 'Ẩn địa chỉ email khách trong bảng bán hàng và trong các danh sách khác';
$_['ms_config_hide_email_in_email'] = 'Ẩn địa chỉ email trong email';
$_['ms_config_hide_email_in_email_note'] = 'Ẩn địa chỉ email khách và người bán trong mail được gửi bởi MultiMerch';

$_['ms_config_other'] = 'Khác';
$_['ms_config_hide_sellers_product_count'] = 'Ẩn số người bán và số sản phẩm trong header';
$_['ms_config_hide_sellers_product_count_note'] = 'Ẩn các tuyến hàng, Trong đó số sản phẩm và số người bán trong header';

$_['ms_config_nickname_rules'] = 'Các luật đặt nickname người bán';
$_['ms_config_nickname_rules_note'] = 'Các bộ ký tự được cho phép trong nickname người bán';
$_['ms_config_nickname_rules_alnum'] = 'Chữ và số';
$_['ms_config_nickname_rules_ext'] = 'Thêm tiếng latin';
$_['ms_config_nickname_rules_utf'] = 'Full UTF-8';

// Avatars
$_['ms_config_avatars_for_sellers'] = 'Avatar của người bán';
$_['ms_config_avatars_for_sellers_note'] = 'Xác định công việc của người bán';
$_['ms_config_avatars_manually'] = 'upload bằng tay từ người bán';
$_['ms_config_avatars_both'] = 'Cả 2 upload từ người bán hoặc được định sẵn';
$_['ms_config_avatars_predefined'] = 'Chỉ được dùng định sẵn';

// Seller - List
$_['ms_catalog_sellers_heading'] = 'Người bán';
$_['ms_catalog_sellers_breadcrumbs'] = 'Người bán';
$_['ms_catalog_sellers_newseller'] = 'Người bán mới';
$_['ms_catalog_sellers_create'] = 'Tạo người bán mới';

$_['ms_catalog_sellers_total_balance'] = 'Tổng số tiền trên số dư: <b>%s</b> (Người bán tích cực: <b>%s</b>)';
$_['ms_catalog_sellers_email'] = 'Email';
$_['ms_catalog_sellers_total_products'] = 'Tổng Sản phẩm';
$_['ms_catalog_sellers_total_sales'] = 'Danh số bán hàng';
$_['ms_catalog_sellers_total_earnings'] = 'Tổng lợi nhuận';
$_['ms_catalog_sellers_current_balance'] = 'Số dư hiện tại';
$_['ms_catalog_sellers_status'] = 'Tình trạng';
$_['ms_catalog_sellers_date_created'] = 'Ngày tạo';
$_['ms_catalog_sellers_balance_paypal'] = 'Thanh toán số dư qua PayPal';

$_['ms_seller_status_' . MsSeller::STATUS_ACTIVE] = 'Kích hoạt';
$_['ms_seller_status_' . MsSeller::STATUS_INACTIVE] = 'Không kích hoạt';
$_['ms_seller_status_' . MsSeller::STATUS_DISABLED] = 'Vô hiệu hóa';
$_['ms_seller_status_' . MsSeller::STATUS_DELETED] = 'Đã xóa';
$_['ms_seller_status_' . MsSeller::STATUS_UNPAID] = 'Chưa trả phí đăng ký';

// Customer-seller form
$_['ms_catalog_sellerinfo_heading'] = 'Người bán';
$_['ms_catalog_sellerinfo_seller_data'] = 'Dữ liệu người bán';

$_['ms_catalog_sellerinfo_customer'] = 'Khách hàng';
$_['ms_catalog_sellerinfo_customer_data'] = 'Dữ liệu khách hàng';
$_['ms_catalog_sellerinfo_customer_new'] = 'Khách hàng mới';
$_['ms_catalog_sellerinfo_customer_existing'] = 'Khách hàng hiện có';
$_['ms_catalog_sellerinfo_customer_create_new'] = 'Tạo mới khách hàng';
$_['ms_catalog_sellerinfo_customer_firstname'] = 'Họ';
$_['ms_catalog_sellerinfo_customer_lastname'] = 'Tên';
$_['ms_catalog_sellerinfo_customer_email'] = 'Email';
$_['ms_catalog_sellerinfo_customer_password'] = 'Password';
$_['ms_catalog_sellerinfo_customer_password_confirm'] = 'Xác nhận password';

$_['ms_catalog_sellerinfo_nickname'] = 'Nickname';
$_['ms_catalog_sellerinfo_keyword'] = 'SEO keyword';
$_['ms_catalog_sellerinfo_description'] = 'Miêu tả';
$_['ms_catalog_sellerinfo_company'] = 'Công ty';
$_['ms_catalog_sellerinfo_country'] = 'Công ty';
$_['ms_catalog_sellerinfo_sellergroup'] = 'Nhóm người bán';

$_['ms_catalog_sellerinfo_country_dont_display'] = 'Không hiển thị quốc gia';
$_['ms_catalog_sellerinfo_avatar'] = 'Avatar';
$_['ms_catalog_sellerinfo_paypal'] = 'Paypal';
$_['ms_catalog_sellerinfo_message'] = 'Tin nhắn';
$_['ms_catalog_sellerinfo_message_note'] = 'Sẽ được gắn thêm vào các văn bản email mặc định';
$_['ms_catalog_sellerinfo_notify'] = 'Thông báo cho người bán qua email';
$_['ms_catalog_sellerinfo_product_validation'] = 'Xác nhận sản phẩm hợp lệ';
$_['ms_catalog_sellerinfo_product_validation_note'] = 'Xác nhận sản phẩm hợp lệ cho người bán';

$_['ms_error_sellerinfo_nickname_empty'] = 'Nickname không được để trống';
$_['ms_error_sellerinfo_nickname_alphanumeric'] = 'Nickname chỉ chứa chữ và số';
$_['ms_error_sellerinfo_nickname_utf8'] = 'Nickname chỉ có thể chứa ký tự UTF-8 in được';
$_['ms_error_sellerinfo_nickname_latin'] = 'Nickname chỉ chứa chữ và số và bỏ dấu';
$_['ms_error_sellerinfo_nickname_length'] = 'Nickname phải có ít nhất 4 ký tự và lớn nhất là 50';
$_['ms_error_sellerinfo_nickname_taken'] = 'Nickname này đã đăng ký rồi';

// Catalog - Products
$_['ms_catalog_products_heading'] = 'Sản phẩm';
$_['ms_catalog_products_breadcrumbs'] = 'Sản phẩm';
$_['ms_catalog_products_notify_sellers'] = 'Thông báo cho người bán';
$_['ms_catalog_products_bulk'] = '--Bulk status change--';
$_['ms_catalog_products_noseller'] = '--Không người bán--';

$_['ms_product_status_' . MsProduct::STATUS_ACTIVE] = 'Kích hoạt';
$_['ms_product_status_' . MsProduct::STATUS_INACTIVE] = 'Không kích hoạt';
$_['ms_product_status_' . MsProduct::STATUS_DISABLED] = 'Vô hiệu hóa';
$_['ms_product_status_' . MsProduct::STATUS_DELETED] = 'Xóa';
$_['ms_product_status_' . MsProduct::STATUS_UNPAID] = 'Chưa thanh toán lệ phí';

$_['ms_catalog_products_field_meta_keyword'] 	 = 'Meta Tag Keywords';
$_['ms_catalog_products_field_meta_description'] = 'Miêu tả Meta Tag';
$_['ms_catalog_products_field_model']            = 'Model';
$_['ms_catalog_products_field_sku']              = 'SKU';
$_['ms_catalog_products_field_upc']              = 'UPC';
$_['ms_catalog_products_field_ean']              = 'EAN';
$_['ms_catalog_products_field_jan']              = 'JAN';
$_['ms_catalog_products_field_isbn']             = 'ISBN';
$_['ms_catalog_products_field_mpn']              = 'MPN';
$_['ms_catalog_products_field_manufacturer']     = 'Hãng sản xuất';
$_['ms_catalog_products_field_date_available']   = 'Date Available';
$_['ms_catalog_products_field_stock_status']     = 'Hết hàng';
$_['ms_catalog_products_field_tax_class']        = 'Lớp thuế';
$_['ms_catalog_products_field_subtract']         = 'Trừ bớt hàng';

// Catalog - Seller Groups
$_['ms_catalog_seller_groups_heading'] = 'Nhóm người bán';
$_['ms_catalog_seller_groups_breadcrumbs'] = 'Nhóm người bán';

$_['ms_seller_groups_column_id'] = 'ID';
$_['ms_seller_groups_column_name'] = 'Tên';
$_['ms_seller_groups_column_action'] = 'Hoạt động';

$_['ms_catalog_insert_seller_group_heading'] = 'Nhóm người bán mới';
$_['ms_catalog_edit_seller_group_heading'] = 'Chỉnh sửa nhóm người bán';

$_['ms_product_period'] = 'Sản phẩm được liệt kê trong ngày (0 = không giới hạn)';
$_['ms_product_quantity'] = 'Số lượng sản phẩm (0 = không giới hạn)';

$_['ms_error_seller_group_name'] = 'Lỗi: Tên phải từ 3 đến 32 ký tự';
$_['ms_error_seller_group_default'] = 'Lỗi: Nhóm người bán mặc định không được xóa!';
$_['ms_success_seller_group_created'] = 'Tạo nhóm người bán';
$_['ms_success_seller_group_updated'] = 'Update nhóm người bán';

// Comments
$_['ms_comments_heading'] = 'Bình luận';
$_['ms_comments_breadcrumbs'] = 'Bình luận';
$_['ms_comments_comment'] = 'Bình luận';
$_['ms_success_comments_deleted'] = 'Xóa bình luận';

// Payments
$_['ms_payment_heading'] = 'Thanh toán';
$_['ms_payment_breadcrumbs'] = 'Thanh toán';
$_['ms_payment_payout_requests'] = 'Các yêu cần thanh toán';
$_['ms_payment_payouts'] = 'Thanh toán bằng tay';
$_['ms_payment_pending'] = 'Tiền xài';
$_['ms_payment_paid'] = 'Trả tiền';
$_['ms_payment_payout_paypal'] = 'Thanh toán qua PayPal';
$_['ms_payment_payout_paypal_invalid'] = 'Địa chỉ PayPal không xác định được hoặc không hợp lệ';
$_['ms_payment_mark'] = 'Đánh dấu đã thanh toán';
$_['ms_payment_delete'] = 'Xóa bản thanh toán đã ghi lại';
$_['ms_payment_confirmation'] = 'Xác nhận thanh toán';
$_['ms_payment_pay'] = 'Chi trả!';
$_['ms_payment_dialog_markpaid'] = 'Khi rút tiền sẽ được đánh dầu là đã trả';
$_['ms_payment_dialog_confirm'] = 'Xác nhận thanh toán';
$_['ms_payment_dialog_ppfee'] = '+ Lệ phí PP';

$_['ms_payment_type_' . MsPayment::TYPE_SIGNUP] = 'Lệ phí đăng ký';
$_['ms_payment_type_' . MsPayment::TYPE_LISTING] = 'Phí niêm yết';
$_['ms_payment_type_' . MsPayment::TYPE_PAYOUT] = 'Thanh toán trực tiếp';
$_['ms_payment_type_' . MsPayment::TYPE_PAYOUT_REQUEST] = 'Yêu cầu thanh toán';
$_['ms_payment_type_' . MsPayment::TYPE_RECURRING] = 'Thanh toán định kỳ';
$_['ms_payment_type_' . MsPayment::TYPE_SALE] = 'Bán hạ giá';

$_['ms_payment_status_' . MsPayment::STATUS_UNPAID] = 'Chưa trả';
$_['ms_payment_status_' . MsPayment::STATUS_PAID] = 'Đã trả';

// Finances - Transactions
$_['ms_transactions_heading'] = 'Các giao dịch';
$_['ms_transactions_breadcrumbs'] = 'Các giao dịch';
$_['ms_transactions_new'] = 'Giao dịch mới';

$_['ms_error_transaction_fromto'] = 'Xin vui lòng ghi rõ ít nhất nguồn hoặc điểm đến';
$_['ms_error_transaction_fromto_same'] = 'Nguồn và điểm đến không được trùng';
$_['ms_error_transaction_amount'] = 'Vui lòng ghi rõ số tiền (dương)';
$_['ms_success_transaction_created'] = 'Giao dịch tạo thành công';

$_['button_cancel'] = 'Hủy';
$_['button_save'] = 'Save';
$_['ms_action'] = 'Hoạt động';

// Attributes
$_['ms_attribute_heading'] = 'Các thuộc tính';
$_['ms_attribute_breadcrumbs'] = 'Các thuộc tính';
$_['ms_attribute_create'] = 'Các thuộc tính mới';
$_['ms_attribute_edit'] = 'Chỉnh sửa thuộc tính';
$_['ms_attribute_group'] = 'Nhóm thuộc tính';
$_['ms_attribute_value'] = 'Giá trị thuộc tính';
$_['ms_attribute_text_type'] = 'Kiểu text đầu vào';
$_['ms_attribute_normal'] = 'Text tổng quát';
$_['ms_attribute_multilang'] = 'text ngôn ngữ riêng';
$_['ms_attribute_number'] = 'Số';
$_['ms_attribute_required'] = 'Yêu cầu';
$_['ms_attribute_tab_display'] = 'Hiển thị tab sản phẩm';
$_['ms_add_attribute_value'] = 'Giá trị thuộc tính mới';
$_['ms_error_attribute_name'] = 'Thuộc tính tên phải từ 1 đến 28 ký tự';
$_['ms_error_attribute_type'] = 'Kiểu thuộc tính yêu cầu giá trị của thuộc tính';
$_['ms_error_attribute_value_name'] = 'Giá thuộc tính tên phải từ 1 đến 28 ký tự';
$_['ms_success_attribute_created'] = 'Thuộc tính tạo thành công';
$_['ms_success_attribute_updated'] = 'Thuộc tính tạo thành công';

$_['button_cancel'] = 'Hủy';
$_['button_save'] = 'Save';
$_['ms_action'] = 'Hoạt động';

// Mails
$_['ms_mail_greeting'] = "Xin Chào %s,\n\n";
$_['ms_mail_ending'] = "\n\nTrân trọng cám ơn,\n%s";
$_['ms_mail_message'] = "\n\nMessage:\n%s";

$_['ms_mail_subject_seller_account_modified'] = 'Thay đổi tài khoản người bán';
$_['ms_mail_seller_account_modified'] = <<<EOT
Tài khoản bán hàng của bạn %s đang được sửa đổi.

Tình trạng tài khoản: %s
EOT;

$_['ms_mail_subject_product_modified'] = 'Thay đổi sản phẩm';
$_['ms_mail_product_modified'] = <<<EOT
Sản phẩm của bạn %s at %s đang được sửa đổi bởi .

Tình trạng sản phẩm: %s
EOT;

$_['ms_mail_subject_product_purchased'] = 'Đặt hàng mới';
$_['ms_mail_product_purchased'] = <<<EOT
Sản phẩm của bạn được mua bởi %s.

Khách hàng: %s (%s)

Sản phẩm:
%s
Tổng: %s
EOT;

$_['ms_mail_product_purchased_no_email'] = <<<EOT
Sản phẩm của bạn được mua bởi %s.

Khách hàng: %s

Sản phẩm:
%s
Tổng: %s
EOT;

$_['ms_mail_product_purchased_info'] = <<<EOT
\n
Địa chỉ giao hàng:

%s %s
%s
%s
%s
%s %s
%s
%s
EOT;

$_['ms_mail_product_purchased_comment'] = 'Bình luận: %s';

// Sales - Mail
$_['ms_transaction_order'] = 'Bán: Đặt hàng Id #%s';
$_['ms_transaction_sale'] = 'Bán: %s (-%s commission)';
$_['ms_transaction_refund'] = 'Tiền hoàn trả lại: %s';
$_['ms_payment_method'] = 'Phương thức thanh toán';
$_['ms_payment_method_balance'] = 'Số dư';
$_['ms_payment_method_paypal'] = 'PayPal';
$_['ms_payment_method_inherit'] = 'Thừa hưởng';
$_['ms_payment_royalty_payout'] = 'Thanh toán bản quyền %s at %s';
$_['ms_payment_generic'] = 'Thanh toán #%s at %s';
$_['ms_payment_completed'] = 'Hoàn thành thanh toán';

// Badges
$_['ms_catalog_badges_breadcrumbs'] = 'Huy hiệu';
$_['ms_catalog_badges_heading'] = 'Huy hiệu';
$_['ms_catalog_badges_image'] = 'Ảnh';
$_['ms_badges_column_id'] = 'ID';
$_['ms_badges_column_name'] = 'Tên';
$_['ms_badges_image'] = 'Ảnh';
$_['ms_badges_column_action'] = 'Hoạt động';
$_['ms_catalog_insert_badge_heading'] = 'Tạo huy hiệu';
$_['ms_catalog_edit_badge_heading'] = 'Chỉnh sửa huy hiệu';
$_['ms_success_badge_created'] = 'Đả tạo huy hiệu';
$_['ms_success_badge_updated'] = 'Update huy hiệu';
$_['ms_error_badge_name'] = 'Vui lòng ghi rõ tên cho huy hiệu';
?>