<?php

// **********
// * Global *
// **********
$_['ms_viewinstore'] = 'Xem trong cửa hàng';
$_['ms_view'] = 'xem';
$_['ms_publish'] = 'Công khai';
$_['ms_unpublish'] = 'Không công khai';
$_['ms_edit'] = 'Chinh sửa';
$_['ms_clone'] = 'Bản sao';
$_['ms_relist'] = 'Niêm yết lại';
$_['ms_rate'] = 'Giá';
$_['ms_download'] = 'Download';
$_['ms_create_product'] = 'Tạo sản phẩm';
$_['ms_delete'] = 'Xóa';
$_['ms_update'] = 'Update';
$_['ms_type'] = 'Loai';
$_['ms_amount'] = 'Số lượng';
$_['ms_status'] = 'Tình trạng';
$_['ms_date_paid'] = 'Ngày trả';
$_['ms_last_message'] = 'Thông điệp cuối cùng';
$_['ms_description'] = 'Mô tả';
$_['ms_id'] = '#';
$_['ms_by'] = 'by';
$_['ms_action'] = 'Hoạt động';
$_['ms_sender'] = 'Người gửi';
$_['ms_message'] = 'Thông điệp';


$_['ms_date_created'] = 'Ngày tạo';
$_['ms_date'] = 'ngày';

$_['ms_button_submit'] = 'Gởi đi';
$_['ms_button_add_special'] = 'Định nghĩa giá trị đặt biệt mới';
$_['ms_button_add_discount'] = 'Định ra số lượng giảm giá mới';
$_['ms_button_generate'] = 'Tạo hình ảnh từ file PDF';
$_['ms_button_submit_request'] = 'Gởi yêu cầu';
$_['ms_button_save'] = 'Lưu';
$_['ms_button_cancel'] = 'Thoát';
$_['ms_button_select_predefined_avatar'] = 'Chọn avatar đã được xác định';

$_['ms_button_select_image'] = 'Chọn hình';
$_['ms_button_select_images'] = 'Chọn nhiều hình';
$_['ms_button_select_files'] = 'Chọn file';

$_['ms_transaction_order'] = 'Giá: ID khác #%s';
$_['ms_transaction_sale'] = 'Giá: %s (-%s tiền hoa hồng)';
$_['ms_transaction_refund'] = 'Hoàn trả: %s';
$_['ms_transaction_listing'] = 'Danh sách sản phẩm: %s (%s)';
$_['ms_transaction_signup']      = 'Lệ phí đăng ký tại %s';
$_['ms_request_submitted'] = 'Yêu cầu của bạn đã được gửi đi';

$_['ms_totals_line'] = 'Hiện tại %s Người bán và %s sản phẩm được bán!';

$_['ms_text_welcome'] = '<a href="%s">Login</a> | <a href="%s">Tạo một tài khoản</a> | <a href="%s">Tạo một tài khoản người bán</a>.';
$_['ms_button_register_seller'] = 'Trình diện như người bán hàng';
$_['ms_register_seller_account'] = 'Ghi tài khoản người bán hàng vào sổ';

// Mails

// Seller
$_['ms_mail_greeting'] = "Xin chào %s,\n\n";
$_['ms_mail_ending'] = "\n\Mối quan hệ,\n%s";
$_['ms_mail_message'] = "\n\nTin nhắn:\n%s";

$_['ms_mail_subject_seller_account_created'] = 'Tài khoản người bán đã được tạo';
$_['ms_mail_seller_account_created'] = <<<EOT
Tài khoản người bán tại %s đã được tạo!

Bạn chưa thể đăng sản phẩm lúc này.
EOT;

$_['ms_mail_subject_seller_account_awaiting_moderation'] = 'tài khoản người bán hàng chờ kiểm duyệt';
$_['ms_mail_seller_account_awaiting_moderation'] = <<<EOT
tài khoản người bán của bạn tai %s đã được tạo và đang chờ kiểm duyệt.

Bạn sẽ nhận được mail ngay khi kiểm duyệt xong.
EOT;

$_['ms_mail_subject_product_awaiting_moderation'] = 'Sản phẩm chờ kiểm duyệt';
$_['ms_mail_product_awaiting_moderation'] = <<<EOT
Sản phẩm của bạn %s tại %s đang chờ kiểm duyệt.

Bạn sẽ nhận được mail khi xử lý xong.
EOT;

$_['ms_mail_subject_product_purchased'] = 'Phiếu đặt mới';
$_['ms_mail_product_purchased'] = <<<EOT
Sản phẩm của bạn đã được mua bởi %s.

Khách hàng: %s (%s)

Sản phẩm:
%s
Tổng: %s
EOT;

$_['ms_mail_subject_seller_contact'] = 'Tin nhắn từ khách hàng';
$_['ms_mail_seller_contact'] = <<<EOT
Bạn nhận được tin nhắn mới từ khách hàng!

Tên: %s

Email: %s

Sản phẩm: %s

Tin nhắn:
%s
EOT;

$_['ms_mail_seller_contact_no_mail'] = <<<EOT
Bạn nhận được tin nhắn mới từ khách hàng!

Tên: %s

Sản phẩm: %s

Tin nhắn:
%s
EOT;

$_['ms_mail_product_purchased_no_email'] = <<<EOT
Sản phẩm của bạn đã được mua bởi %s.

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

$_['ms_mail_subject_withdraw_request_submitted'] = 'Yêu cầu thanh toán đã được gửi';
$_['ms_mail_withdraw_request_submitted'] = <<<EOT
Chúng tôi đã nhận được yêu cầu thanh toán của bạn. Bạn sẽ nhận được lãi ngay khi xử lý xong.
EOT;

$_['ms_mail_subject_withdraw_request_completed'] = 'Thanh toán hoàn thành';
$_['ms_mail_withdraw_request_completed'] = <<<EOT
Yêu cầu thanh toán của bạn đã được xử lý xong. Bạn nên nhận lại lãi của mình.
EOT;

$_['ms_mail_subject_withdraw_request_declined'] = 'Yêu cầu thanh toán bị từ chối';
$_['ms_mail_withdraw_request_declined'] = <<<EOT
Yêu cầu thanh toán của bạn đã bị từ chối. Hoàn lại tiền cho bạn tại %s.
EOT;

$_['ms_mail_subject_transaction_performed'] = 'Giao dịch mới';
$_['ms_mail_transaction_performed'] = <<<EOT
Giao dịch mới đã được tạo tại %s.
EOT;

// *********
// * Admin *
// *********
$_['ms_mail_admin_subject_seller_account_created'] = 'Tài khoản người bán mới đã được tạo';
$_['ms_mail_admin_seller_account_created'] = <<<EOT
Tài khoản người bán mới tại %s đã được tạo!
EOT;

$_['ms_mail_admin_subject_seller_account_awaiting_moderation'] = 'Tải khoản người bán mới đang chờ kiểm duyệt';
$_['ms_mail_admin_seller_account_awaiting_moderation'] = <<<EOT
Tải khoản người bán mới tại %s đã được tạo và đang chờ kiểm duyệt.

Bạn có thể xử lý trong Multiseller - Phần người bán back office.
EOT;

$_['ms_mail_admin_subject_product_created'] = 'Sản phẩm mới đã được thêm vào';
$_['ms_mail_admin_product_created'] = <<<EOT
Sản phẩm mới %s đã được tao đến %s.

Bạn có thể xem và chỉnh sửa trong back office.
EOT;

$_['ms_mail_admin_subject_new_product_awaiting_moderation'] = 'Sản mới đang chờ kiểm duyệt';
$_['ms_mail_admin_new_product_awaiting_moderation'] = <<<EOT
New product %s has been added to %s and is awaiting moderation.

Bạn có thể xử lý trong Multiseller - phần sản phẩm trong back office.
EOT;

$_['ms_mail_admin_subject_edit_product_awaiting_moderation'] = 'Sản phẩm đã được chỉnh sửa và đang chờ kiểm duyệt';
$_['ms_mail_admin_edit_product_awaiting_moderation'] = <<<EOT
Sản phẩm %s tại %s đã được chỉnh sửa và đang chờ kiểm duyệt.

Bạn có thể xử lý trong Multiseller - phần sản phẩm trong back office.
EOT;

$_['ms_mail_admin_subject_withdraw_request_submitted'] = 'Yêu cầu thanh toán mới đang chờ kiểm duyệt';
$_['ms_mail_admin_withdraw_request_submitted'] = <<<EOT
Yêu cầu thanh toán mớiđang chờ kiểm duyệt.

Bạn có thể xử lý trong Multiseller - phần tài chính trong back office.
EOT;

// Success
$_['ms_success_product_published'] = 'Sản phẩm công khai';
$_['ms_success_product_unpublished'] = 'Sản phẩm không được công khai';
$_['ms_success_product_created'] = 'Sản phẩm đã được tạo';
$_['ms_success_product_updated'] = 'Sản phẩm đã được cập nhập';
$_['ms_success_product_deleted'] = 'Sản phẩm đã được xóa';

// Errors
$_['ms_error_sellerinfo_nickname_empty'] = 'Tên tài khoản không được rỗng';
$_['ms_error_sellerinfo_nickname_alphanumeric'] = 'Tên tài khoản chỉ được chứa chữ và số';
$_['ms_error_sellerinfo_nickname_utf8'] = 'Tên tài khoản chỉ có thể chứa những ký tự UTF-8 có thể in được';
$_['ms_error_sellerinfo_nickname_latin'] = 'Tên tài khoản chỉ được chứa chữ và số và những ký tự Châu Âu';
$_['ms_error_sellerinfo_nickname_length'] = 'Tên tài khoản phải tử 4 đến 50 ký tự';
$_['ms_error_sellerinfo_nickname_taken'] = 'Tên tài khoản này đã được sử dụng';
$_['ms_error_sellerinfo_company_length'] = 'Tên công ty không được lớn hơn 50 ký tự';
$_['ms_error_sellerinfo_description_length'] = 'Mô tả không dài hơn 1000 ký tự';
$_['ms_error_sellerinfo_paypal'] = 'Địa chỉ PayPal không chính xác';
$_['ms_error_sellerinfo_terms'] = 'Cảnh báo: bạn phải đồng ý với %s';
$_['ms_error_file_extension'] = 'Bổ sung không chính xác';
$_['ms_error_file_type'] = 'Loại file không chính xác';
$_['ms_error_file_size'] = 'File quá lớn';
$_['ms_error_image_too_small'] = 'Kích thước hình quá nhỏ. Kích thước tối thiểu là: %s x %s (rộng x cao)';
$_['ms_error_image_too_big'] = 'Kích thước hình quá lớn. Kích thước tối đa là: %s x %s (rộng x cao)';
$_['ms_error_file_upload_error'] = 'File đưa lên sai';
$_['ms_error_form_submit_error'] = 'Lỗi xuất hiện khi gửi. Xin hãy liên hệ với người chủ cửa hàng để biết thêm chi tiết.';
$_['ms_error_form_notice'] = 'Xin hãy kiểm tra tất cả tên vì đã có lỗi.';
$_['ms_error_product_name_empty'] = 'Tên sản phẩm không được rỗng';
$_['ms_error_product_name_length'] = 'Tên sản phẩm nên có độ dài từ %s đến %s ký tự';
$_['ms_error_product_description_empty'] = 'Mô tả sản phẩm không được rỗng';
$_['ms_error_product_description_length'] = 'Mô tả sản phẩm nên có độ dài từ %s đến %s ký tự';
$_['ms_error_product_tags_length'] = 'Dòng quá dài';
$_['ms_error_product_price_empty'] = 'Xin hãy giá thành của sản phẩm';
$_['ms_error_product_price_invalid'] = 'Giá không xác định';
$_['ms_error_product_price_low'] = 'Giá quá thấp';
$_['ms_error_product_price_high'] = 'Giá quá cao';
$_['ms_error_product_category_empty'] = 'Xin hãy chọn một loại';
$_['ms_error_product_model_empty'] = 'Mẫu sản phẩm không được rỗng';
$_['ms_error_product_model_length'] = 'Mẫu sản phẩm nên có độ dài từ %s đến %s ký tự';
$_['ms_error_product_image_count'] = 'Xin hãy upload ít nhất %s hình cho sản phẩm của bạn';
$_['ms_error_product_download_count'] = 'Xin hãy gửi lên ít nhất %s download cho sản phẩm của bạn';
$_['ms_error_product_image_maximum'] = 'Không được nhiều hơn %s ảnh';
$_['ms_error_product_download_maximum'] = 'Không được nhiều hơn %s download';
$_['ms_error_product_message_length'] = 'Thông điệp không được nhiều hơn 1000 ký tự';
$_['ms_error_product_invalid_pdf_range'] = 'Xin hãy chỉ định dấu phẩy phân cách (,) trang hay dấu gạch nối (-)';
$_['ms_error_product_attribute_required'] = 'Thuộc tính này là bắt buộc';
$_['ms_error_product_attribute_long'] = 'Giá trị này không được dài hơn %s ký tự';
$_['ms_error_withdraw_amount'] = 'Số lượng không chính xác';
$_['ms_error_withdraw_balance'] = 'Không đủ tiền';
$_['ms_error_withdraw_minimum'] = 'Không thể rút ít hơn giới hạn';
$_['ms_error_contact_email'] = 'Xin chỉ định một email chính xác';
$_['ms_error_contact_captcha'] = 'mã captcha không chính xác';
$_['ms_error_contact_text'] = 'Thông điệp không được dài hơn 2000 ký tự';
$_['ms_error_contact_allfields'] = 'Xin hãy điền đầy đủ thông tin';

// Account - General 
$_['ms_account_register_seller'] = 'Ghi toàn bộ tài khoản người bán hàng';

$_['ms_seller'] = 'Người bán';
$_['ms_account_dashboard'] = 'Bảng điều khiển';
$_['ms_account_seller_account'] = 'Tài khoản người bán';
$_['ms_account_sellerinfo'] = 'Thông tin người bán';
$_['ms_account_sellerinfo_new'] = 'Tài khoản người bán mới';
$_['ms_account_newproduct'] = 'Sản phẩm mới';
$_['ms_account_products'] = 'Sản phẩm';
$_['ms_account_transactions'] = 'Giao dịch';
$_['ms_account_orders'] = 'Đơn đặt hàng';
$_['ms_account_withdraw'] = 'Yêu cầu thanh toán';
$_['ms_account_badges'] = 'Huy hiệu';
$_['ms_account_badges_nobadges'] = 'Vẫn chưa có huy hiệu';

// Account - New product
$_['ms_account_newproduct_heading'] = 'Sản phẩm mới';
$_['ms_account_newproduct_breadcrumbs'] = 'Sản phẩm mới';
//General Tab
$_['ms_account_product_tab_general'] = 'Tổng hợp';
$_['ms_account_product_tab_specials'] = 'Giá trị đặc biệt';
$_['ms_account_product_tab_discounts'] = 'Số lượng giảm giá';
$_['ms_account_product_name_description'] = 'Tên và mô tả';
$_['ms_account_product_name'] = 'Tên';
$_['ms_account_product_name_note'] = 'Chỉ định một tên cho sản phẩm của bạn';
$_['ms_account_product_description'] = 'Mô tả';
$_['ms_account_product_description_note'] = 'Mô tả sản phẩm';
$_['ms_account_product_meta_description'] = 'Mô tả mê ta';
$_['ms_account_product_meta_description_note'] = 'Chỉ định mô tả meta cho sản phẩm';
$_['ms_account_product_meta_keyword'] = 'khóa chính meta';
$_['ms_account_product_meta_keyword_note'] = 'Chỉ định khóa chính meta cho sản phẩm';
$_['ms_account_product_tags'] = 'thẻ';
$_['ms_account_product_tags_note'] = 'Chỉ định thẻ cho sản phẩm.';
$_['ms_account_product_price_attributes'] = 'Giá cả và thuộc tính';
$_['ms_account_product_price'] = 'Giá';
$_['ms_account_product_price_note'] = 'Hãy chọn giá cho sản phẩm';
$_['ms_account_product_listing_flat'] = 'Lệ phí niêm yết cho sản phẩm là <span>%s</span>';
$_['ms_account_product_listing_percent'] = 'Lệ phí niêm yết cho sản phẩm là dựa trên giá sản phẩm. Lệ phí niêm yết hiện tại: <span>%s</span>.';
$_['ms_account_product_listing_balance'] = 'Số lượng này sẽ được khấu trừ từ tiền dư người bán.';
$_['ms_account_product_listing_paypal'] = 'Bạn sẽ được chuyển hướng đến thanh toán paypal sau khi trình sản phẩm.';
$_['ms_account_product_listing_itemname'] = 'Lệ phí niêm yết sản phẩm tại %s';
$_['ms_account_product_listing_until'] = 'Sản phẩm này sẽ ở trên danh sách trong %s';
$_['ms_account_product_category'] = 'Thể loại';
$_['ms_account_product_category_note'] = 'Chọn loại sản phẩm cho bạn';
$_['ms_account_product_enable_shipping'] = 'Có thể vận chuyển';
$_['ms_account_product_enable_shipping_note'] = 'Hãy chỉ định nếu sản phẩm của bạn được yêu cầu vận chuyển';
$_['ms_account_product_quantity'] = 'Số lượng';
$_['ms_account_product_quantity_note']    = 'Chỉ định số lượng của sản phẩm';
$_['ms_account_product_files'] = 'File';
$_['ms_account_product_download'] = 'Downloads';
$_['ms_account_product_download_note'] = 'Download file cho sản phẩm. Cho phép mở rộng: %s';
$_['ms_account_product_push'] = 'Đưa những cập nhập đến những khách cũ';
$_['ms_account_product_push_note'] = 'Những sản phẩm mới và những tải về đã được cập nhập sẽ được đưa đến những khách hàng thân thuộc';
$_['ms_account_product_image'] = 'Hình ảnh';
$_['ms_account_product_image_note'] = 'Chọn hình ảnh cho sản phẩm của bạn. Hình ảnh đầu tiên sẽ được chủ yếu sử dụng. Bạn có thể thay đổi bằng cách kéo khung. Cho phép mở rộng: %s';
$_['ms_account_product_message_reviewer'] = 'Thông điệp đến người xem';
$_['ms_account_product_message'] = 'Thông điệp';
$_['ms_account_product_message_note'] = 'Thông điệp đến người xem';
//Data Tab
$_['ms_account_product_tab_data'] = 'Dữ liệu';
$_['ms_account_product_model'] = 'Mẫu';
$_['ms_account_product_sku'] = 'SKU';
$_['ms_account_product_sku_note'] = 'Giữ đơn vị cổ phiếu (Stock Keeping Unit)';
$_['ms_account_product_upc']  = 'UPC';
$_['ms_account_product_upc_note'] = 'Mã sản phẩm thế giới (Universal Product Code)';
$_['ms_account_product_ean'] = 'EAN';
$_['ms_account_product_ean_note'] = 'Số điều khoản châu âu (European Article Number)';
$_['ms_account_product_jan'] = 'JAN';
$_['ms_account_product_jan_note'] = 'Số điều khoản nhật bản (Japanese Article Number)';
$_['ms_account_product_isbn'] = 'ISBN';
$_['ms_account_product_isbn_note'] = 'Tiêu chuẩn số sách quốc tế (International Standard Book Number)';
$_['ms_account_product_mpn'] = 'MPN';
$_['ms_account_product_mpn_note'] = 'Mã sản xuất của nhà sản xuất (Manufacturer Part Number)';
$_['ms_account_product_manufacturer'] = 'Nhà sản xuất';
$_['ms_account_product_manufacturer_note'] = '(Tự động hoàn thành)';
$_['ms_account_product_tax_class'] = 'Lớp thuế';
$_['ms_account_product_date_available'] = 'Ngày có sẵn';
$_['ms_account_product_stock_status'] = 'Trạng thái hết hàng';
$_['ms_account_product_stock_status_note'] = 'Hiện trạng thái khi sản phẩm hết hàng';
$_['ms_account_product_subtract'] = 'Trừ bớt hàng đi';


$_['ms_account_product_priority'] = 'Ưu tiên';
$_['ms_account_product_date_start'] = 'Ngày bắt đầu';
$_['ms_account_product_date_end'] = 'Ngày kết thúc';
$_['ms_account_product_sandbox'] = 'Cảnh báo: cổng thanh toán trong \'Sandbox Mode\'. Tài khoản của bạn sẽ không bị thay đổi.';

// Account - Edit product
$_['ms_account_editproduct_heading'] = 'Chỉnh sửa sản phẩm';
$_['ms_account_editproduct_breadcrumbs'] = 'Chỉnh sửa sản phẩm';

// Account - Clone product
$_['ms_account_cloneproduct_heading'] = 'Sản phẩm sao lưu';
$_['ms_account_cloneproduct_breadcrumbs'] = 'Sản phẩm sao lưu';

// Account - Relist product
$_['ms_account_relist_product_heading'] = 'Niêm yết lại sản phẩm';
$_['ms_account_relist_product_breadcrumbs'] = 'Niêm yết lại sản phẩm';

// Account - Seller
$_['ms_account_sellerinfo_heading'] = 'Thông tin người bán';
$_['ms_account_sellerinfo_breadcrumbs'] = 'Thông tin người bán';
$_['ms_account_sellerinfo_nickname'] = 'Nickname';
$_['ms_account_sellerinfo_nickname_note'] = 'Ghi rõ nickname người bán hàng.';
$_['ms_account_sellerinfo_description'] = 'Mô tả';
$_['ms_account_sellerinfo_description_note'] = 'Mô tả bản thân';
$_['ms_account_sellerinfo_company'] = 'Công ty';
$_['ms_account_sellerinfo_company_note'] = 'Công ty của bạn (tùy chọn)';
$_['ms_account_sellerinfo_country'] = 'Quốc gia';
$_['ms_account_sellerinfo_country_dont_display'] = 'Không hiển thị quốc gia của tôi';
$_['ms_account_sellerinfo_country_note'] = 'Chọn quốc gia của bạn.';
$_['ms_account_sellerinfo_zone'] = 'Khu vực';
$_['ms_account_sellerinfo_zone_select'] = 'Chọn khu vực';
$_['ms_account_sellerinfo_zone_not_selected'] = 'Vẫn chưa chọn khu vực';
$_['ms_account_sellerinfo_zone_note'] = 'Hãy chọn khu vực của bạn trên danh sách.';
$_['ms_account_sellerinfo_avatar'] = 'Avatar';
$_['ms_account_sellerinfo_avatar_note'] = 'Chọn ảnh đại diện của bạn';
$_['ms_account_sellerinfo_paypal'] = 'Paypal';
$_['ms_account_sellerinfo_paypal_note'] = 'Ghi rõ địa chỉ PayPal của bạn';
$_['ms_account_sellerinfo_reviewer_message'] = 'Thông nghiệp đến người xem';
$_['ms_account_sellerinfo_reviewer_message_note'] = 'Thông điệp của bạn đến người xem';
$_['ms_account_sellerinfo_terms'] = 'Chấp nhận điều khoảng';
$_['ms_account_sellerinfo_terms_note'] = 'Tôi đã đọc và đồng ý với <a class="colorbox" href="%s" alt="%s"><b>%s</b></a>';
$_['ms_account_sellerinfo_fee_flat'] = 'Có 1 phí đăng ký o<span>%s</span> để trở thành người bán ở %s.';
$_['ms_account_sellerinfo_fee_balance'] = 'Số lượng sẽ được khấu trừ từ tiền dư trả trước của bạn.';
$_['ms_account_sellerinfo_fee_paypal'] = 'Bạn sẽ được chuyển hướng đến thanh toán PayPal.';
$_['ms_account_sellerinfo_signup_itemname'] = 'Đăng ký tài khoản người bán hàng trong %s';
$_['ms_account_sellerinfo_saved'] = 'Dữ liệu tài khoản người bán hàng đã được lưu.';

$_['ms_account_status'] = 'Tình trạng tài khoản người bán: ';
$_['ms_account_status_tobeapproved'] = '<br />Tài khoản của bạn sẽ được sử dụng ngay khi được phê duyệt bởi người chủ cửa hàng.';
$_['ms_account_status_please_fill_in'] = 'Xin hãy hoàn thành mẫu bên dưới để tạo một tài khoản người bán.';

$_['ms_seller_status_' . MsSeller::STATUS_ACTIVE] = 'Kích hoạt';
$_['ms_seller_status_' . MsSeller::STATUS_INACTIVE] = 'Không kích hoạt';
$_['ms_seller_status_' . MsSeller::STATUS_DISABLED] = 'Vô hiệu hóa';
$_['ms_seller_status_' . MsSeller::STATUS_DELETED] = 'Xóa';
$_['ms_seller_status_' . MsSeller::STATUS_UNPAID] = 'Chưa thanh toán tiền đăng ký';

// Account - Products
$_['ms_account_products_heading'] = 'Sản phẩm của bạn';
$_['ms_account_products_breadcrumbs'] = 'Sản phẩm của bạn';
$_['ms_account_products_product'] = 'Sản phẩm';
$_['ms_account_products_sales'] = 'Giá';
$_['ms_account_products_earnings'] = 'Lợi nhuận';
$_['ms_account_products_status'] = 'Tình trạng';
$_['ms_account_products_date'] = 'Ngày thêm vào';
$_['ms_account_products_listing_until'] = 'Danh sách cho đến khi';
$_['ms_account_products_action'] = 'Hoạt động';
$_['ms_account_products_noproducts'] = 'Bạn chưa có sản phẩm nào cả!';
$_['ms_account_products_confirmdelete'] = 'Có phải bạn muốn xóa sản phẩm của bạn?';

$_['ms_not_defined'] = 'Chưa được xác nhận';

$_['ms_product_status_' . MsProduct::STATUS_ACTIVE] = 'Kích hoạt';
$_['ms_product_status_' . MsProduct::STATUS_INACTIVE] = 'Không kích hoạt';
$_['ms_product_status_' . MsProduct::STATUS_DISABLED] = 'Vô hiệu hóa';
$_['ms_product_status_' . MsProduct::STATUS_DELETED] = 'Xóa';
$_['ms_product_status_' . MsProduct::STATUS_UNPAID] = ' Chưa thanh toán tiền đăng ký';

// Account - ratings
$_['ms_seller_ratings'] = 'Đánh giá: ';
$_['ms_seller_rate_title'] = 'Đánh giá người bán hàng';

$_['ms_seller_rating_communication'] = 'Thông tin: ';
$_['ms_seller_rating_honesty'] = 'Thành thật: ';
$_['ms_seller_rating_overall'] = 'Tổng thể: ';
$_['ms_seller_rate_comment_text'] = 'Bình luận';

$_['entry_bad'] = 'Xấu';
$_['entry_good'] = 'Tốt';

$_['ms_seller_rate_success'] = 'Đánh giá đã được gửi đi!';
$_['ms_error_rate_comment_length'] = 'Bình luận quá dài, chỉ được nhỏ hơn 300 ký tự';
$_['ms_error_rate_no_comment'] = 'Hãy ghi bình luận.';
$_['ms_error_rate_no_rating'] = 'Tất cả giá nên được ghi rõ.';

// Account - Conversations and Messages
$_['ms_account_conversations'] = 'Các cuộc trò chuyện';
$_['ms_account_messages'] = 'Thông điệp';

$_['ms_account_conversations_heading'] = 'Cuộc trò chuyện của bạn';
$_['ms_account_conversations_breadcrumbs'] = 'Cuộc trò chuyện của bạn';

$_['ms_account_conversations_status'] = 'Tình trạng';
$_['ms_account_conversations_date_created'] = 'Ngày tạo';
$_['ms_account_conversations_with'] = 'Liên lạc với';
$_['ms_account_conversations_title'] = 'Nhận';

$_['ms_conversation_title_product'] = 'Thăm dò về sản phẩm: %s';
$_['ms_conversation_title'] = 'Thăm dò từ %s';

$_['ms_account_conversations_read'] = 'Đọc';
$_['ms_account_conversations_unread'] = 'Không đọc';

$_['ms_account_messages_heading'] = 'Thông điệp';
$_['ms_account_messages_breadcrumbs'] = 'Thông điệp';

$_['ms_message_text'] = 'Thông điệp của bạn';
$_['ms_post_message'] = 'Gọi thông điệp';

$_['ms_error_empty_message'] = 'Thông điệp không được rỗng';

$_['ms_mail_subject_private_message'] = 'Nhận được tin nhắn riêng tư';
$_['ms_mail_private_message'] = <<<EOT
Bạn vừa nhận được tin nhắn riêng tư từ %s!

%s

%s

Bạn có thể hồi âm bằng tài khoản của mình.
EOT;


$_['ms_mail_subject_seller_vote'] = 'Bình chọn cho người bán';
$_['ms_mail_seller_vote_message'] = 'Bình chọn cho người bán';

// Account - Transactions
$_['ms_account_transactions_heading'] = 'Tiền của bạn';
$_['ms_account_transactions_breadcrumbs'] = 'Tiền của bạn';
$_['ms_account_transactions_balance'] = 'Số dư của bạn:';
$_['ms_account_transactions_earnings'] = 'Tiền kiếm được mỗi ngày:';
$_['ms_account_transactions_records'] = 'Tiền dư ghi lại';
$_['ms_account_transactions_description'] = 'Mô tả';
$_['ms_account_transactions_amount'] = 'Số lượng';
$_['ms_account_transactions_notransactions'] = 'Bạn vẫn chưa giao dịch!';

// Payments
$_['ms_payment_payments'] = 'Thanh toán';
$_['ms_payment_order'] = 'Khác #%s';
$_['ms_payment_type_' . MsPayment::TYPE_SIGNUP] = 'Lệ phí đăng ký';
$_['ms_payment_type_' . MsPayment::TYPE_LISTING] = 'Phí niêm yết';
$_['ms_payment_type_' . MsPayment::TYPE_PAYOUT] = 'Thanh toán trực tiếp';
$_['ms_payment_type_' . MsPayment::TYPE_PAYOUT_REQUEST] = 'Yêu cầu thanh toán';
$_['ms_payment_type_' . MsPayment::TYPE_RECURRING] = 'Thanh toán định kỳ';
$_['ms_payment_type_' . MsPayment::TYPE_SALE] = 'Giá';

$_['ms_payment_status_' . MsPayment::STATUS_UNPAID] = 'Chưa trả';
$_['ms_payment_status_' . MsPayment::STATUS_PAID] = 'Đã trã';

// Account - Orders
$_['ms_account_orders_heading'] = 'Phiếu đặt của bạn';
$_['ms_account_orders_breadcrumbs'] = 'Phiếu đặt của bạn';
$_['ms_account_orders_id'] = 'Phiếu đặt #';
$_['ms_account_orders_customer'] = 'Khách hàng';
$_['ms_account_orders_products'] = 'Sản phẩm';
$_['ms_account_orders_total'] = 'Tổng số lượng';
$_['ms_account_orders_noorders'] = 'Bạn chưa có bất kỳ phiếu đặt nào!';

// Account - Dashboard
$_['ms_account_dashboard_heading'] = 'Bảng quản lý người bán hàng';
$_['ms_account_dashboard_breadcrumbs'] = 'bảng quản lý người bán hàng';
$_['ms_account_dashboard_orders'] = 'Phiếu đặt cuối cùng';
$_['ms_account_dashboard_comments'] = 'Bình luận cuối cùng';
$_['ms_account_dashboard_overview'] = 'Tổng quan';
$_['ms_account_dashboard_seller_group'] = 'Nhóm bán hàng';
$_['ms_account_dashboard_listing'] = 'Lệ phí niêm yết';
$_['ms_account_dashboard_sale'] = 'Lệ phí bán';
$_['ms_account_dashboard_stats'] = 'Chỉ số';
$_['ms_account_dashboard_balance'] = 'Tiền dư hiện tại';
$_['ms_account_dashboard_total_sales'] = 'Tổng giá';
$_['ms_account_dashboard_total_earnings'] = 'Tổng số tiền kiếm được';
$_['ms_account_dashboard_sales_month'] = 'Giá tháng này';
$_['ms_account_dashboard_earnings_month'] = 'Kiếm được tháng này';
$_['ms_account_dashboard_nav'] = 'Chuyển hướng nhanh';
$_['ms_account_dashboard_nav_profile'] = 'Chỉnh sửa thông tin tài khoản người bán hàng của bạn';
$_['ms_account_dashboard_nav_product'] = 'Tạo 1 sản phẩm mới';
$_['ms_account_dashboard_nav_products'] = 'Quản lý sản phẩm của bạn';
$_['ms_account_dashboard_nav_orders'] = 'Xem phiếu đặt của bạn';
$_['ms_account_dashboard_nav_balance'] = 'Xem hồ sơ tài chính của bạn';
$_['ms_account_dashboard_nav_payout'] = 'Yêu cầu thanh toán của bạn';

// Account - Comments
$_['ms_account_comments_name'] = 'Tên';
$_['ms_account_comments_product'] = 'Sản phẩm';
$_['ms_account_comments_comment'] = 'Bình luận';
$_['ms_account_comments_nocomments'] = 'Bạn vẫn chưa có bình luận nào!';

// Account - Request withdrawal
$_['ms_account_withdraw_heading'] = 'Yêu cầu thanh toán';
$_['ms_account_withdraw_breadcrumbs'] = 'Yêu cầu thanh toán';
$_['ms_account_withdraw_balance'] = 'Tiền dư hiện tại của bạn:';
$_['ms_account_withdraw_balance_available'] = 'Có thể rút :';
$_['ms_account_withdraw_minimum'] = 'Số lượng thanh toán tối đa:';
$_['ms_account_balance_reserved_formatted'] = '-%s rút đơn chưa giải quyết xong';
$_['ms_account_balance_waiting_formatted'] = '-%s thời điểm đợi';
$_['ms_account_withdraw_description'] = 'Yêu cầu thanh toán thông qua %s (%s) trên %s';
$_['ms_account_withdraw_amount'] = 'Số lượng:';
$_['ms_account_withdraw_amount_note'] = 'Xin hay chỉ định số lượng thanh toán';
$_['ms_account_withdraw_method'] = 'Phương thức thánh toán:';
$_['ms_account_withdraw_method_note'] = 'Xin hãy chọn phương thức thanh toán';
$_['ms_account_withdraw_method_paypal'] = 'PayPal';
$_['ms_account_withdraw_all'] = 'Tất cả giá trị kiếm được đều vừa có sẵn';
$_['ms_account_withdraw_minimum_not_reached'] = 'Tổng tiền dư của bạn it hơn số lượng thanh toán tối thiểu!';
$_['ms_account_withdraw_no_funds'] = 'Chưa có quỹ được rút.';
$_['ms_account_withdraw_no_paypal'] = 'xin <a href="index.php?route=seller/account-profile">chỉ định địa chỉ paypal của bạn </a> first!';

// Product page - Seller information
$_['ms_catalog_product_sellerinfo'] = 'Thông tin người bán hàng';
$_['ms_catalog_product_contact'] = 'Liên hệ đến người bán hàng này';

// Product page - Comments
$_['ms_comments_post_comment'] = 'Bài bình luận';
$_['ms_comments_name'] = 'Tên';
$_['ms_comments_note'] = '<span style="color: #FF0000;">Note:</span> HTML chưa được dịch!';
$_['ms_comments_email'] = 'E-mail';
$_['ms_comments_comment'] = 'Bình luận';
$_['ms_comments_wait'] = 'Xin chờ đợi!';
$_['ms_comments_login_register'] = 'Xin <a href="%s">login</a> hay <a href="%s">đăng ký</a> để đăng bình luận.';
$_['ms_comments_error_name'] = 'Xin hãy nhập 1 tên có độ dài từ %s đến %s';
$_['ms_comments_error_email'] = 'Xin hãy nhập 1 email khả dụng';
$_['ms_comments_error_comment_short'] = 'Phần bình luận cần phải ít nhất %s ký tự';
$_['ms_comments_error_comment_long'] = 'Phần bình luận không thể dài hơn %s ký tự';
$_['ms_comments_error_captcha'] = 'việc xác minh mã không phù hợp với hình ảnh';
$_['ms_comments_success'] = 'Cảm ơn vì bình luận của bạn.';
$_['ms_comments_captcha'] = 'Nhập mã trong bảng bên dưới:';
$_['ms_comments_no_comments_yet'] = 'Bình luận vẫn chưa được điền vào';
$_['ms_comments_tab_comments'] = 'Bình luận (%s)';
$_['ms_footer'] = '<br>MultiMerch Marketplace by <a href="http://multimerch.com/">multimerch.com</a>';

// Catalog - Sellers list
$_['ms_catalog_sellers_heading'] = 'Người bán';
$_['ms_catalog_sellers_country'] = 'Quốc gia:';
$_['ms_catalog_sellers_website'] = 'Website:';
$_['ms_catalog_sellers_company'] = 'Công ty:';
$_['ms_catalog_sellers_totalsales'] = 'Giá:';
$_['ms_catalog_sellers_totalproducts'] = 'Sản phẩm:';
$_['ms_sort_country_desc'] = 'Quốc gia (Z - A)';
$_['ms_sort_country_asc'] = 'Quốc gia (A - Z)';
$_['ms_sort_nickname_desc'] = 'Tên (Z - A)';
$_['ms_sort_nickname_asc'] = 'Tên (A - Z)';

// Catalog - Seller profile page
$_['ms_catalog_sellers'] = 'Người bán hàng';
$_['ms_catalog_sellers_empty'] = 'Vẫn chưa có người bán hàng nào.';
$_['ms_catalog_seller_profile_heading'] = '%s\'s thông tin';
$_['ms_catalog_seller_profile_breadcrumbs'] = '%s\'s thông tin';
$_['ms_catalog_seller_profile_products'] = 'Một số sản phẩm của người bán hàng';
$_['ms_catalog_seller_profile_tab_products'] = 'Sản phẩm';
$_['ms_catalog_seller_profile_tab_comments'] = 'Bình luận';
$_['ms_catalog_seller_profile_country'] = 'Quốc gia:';
$_['ms_catalog_seller_profile_zone'] = 'Khu vực:';
$_['ms_catalog_seller_profile_website'] = 'Website:';
$_['ms_catalog_seller_profile_company'] = 'Công ty:';
$_['ms_catalog_seller_profile_totalsales'] = 'Giá trị tổng:';
$_['ms_catalog_seller_profile_totalproducts'] = 'Tổng sản phẩm:';
$_['ms_catalog_seller_profile_view'] = 'Xem tất cả sản phẩm của %s\'';

// Ratings
$_['ms_catalog_seller_profile_rating'] = 'Đánh giá:';
$_['ms_catalog_seller_profile_ratings_singular'] = 'Đánh giá';
$_['ms_catalog_seller_profile_ratings_plural'] = 'Đánh giá';
$_['ms_catalog_seller_profile_rating_overall'] = 'Đánh giá tổng quen:';
$_['ms_catalog_seller_profile_rating_communication'] = 'Đánh giá về thông tin:';
$_['ms_catalog_seller_profile_rating_honesty'] = 'Đánh giá tính trung thực:';
$_['ms_catalog_seller_profile_rating_not_defined'] = 'Chưa đánh giá';

// Catalog - Seller's products list
$_['ms_catalog_seller_products_heading'] = '%s\'s Sản phẩm';
$_['ms_catalog_seller_products_breadcrumbs'] = '%s\'s Sản phẩm';
$_['ms_catalog_seller_products_empty'] = 'Người bán hàng này vẫn chưa có sản phẩm nào!';

// Catalog - Carousel
$_['ms_carousel_sellers'] = 'Người bán hàng của chúng ta';
$_['ms_carousel_view'] = 'Xem tất cả người bán hàng';

// Catalog - Top sellers
$_['ms_topsellers_sellers'] = 'Những người bán hàng đầu';
$_['ms_topsellers_view'] = 'Xem tất cả người bán';

// Catalog - New sellers
$_['ms_newsellers_sellers'] = 'Người bán mới';
$_['ms_newsellers_view'] = 'Xem tất cả người bán';

// Catalog - Seller dropdown
$_['ms_sellerdropdown_sellers'] = 'Người bán của chúng ta';
$_['ms_sellerdropdown_select'] = '-- Chọn 1 người bán --';

// Catalog - Seller contact dialog
$_['ms_sellercontact_title'] = 'Liên hệ người bán';
$_['ms_sellercontact_name'] = 'Tên của bạn';
$_['ms_sellercontact_email'] = 'Email của bạn';
$_['ms_sellercontact_text'] = 'Thông điệp của bạn';
$_['ms_sellercontact_captcha'] = 'Captcha';
$_['ms_sellercontact_sendmessage'] = 'Gởi 1 thông điệp đến %s';
$_['ms_sellercontact_success'] = 'Thông điệp của bạn đã được gởi thành công';

// Account - PDF generator dialog
$_['ms_pdfgen_title'] = 'Đưa ra hình ảnh từ file PDF';
$_['ms_pdfgen_pages'] = 'Trang';
$_['ms_pdfgen_note'] = 'Chọn trang có hình ảnh cần đưa ra. Hình ảnh mới sẽ được thêm vào trang mới trong trang sản phẩm.';
$_['ms_pdfgen_file'] = 'File';
?>
