<?php
// Heading
$_['heading_title']	= '[ffct.cc]Thanh toán PayPal cho MultiMerch';

$_['text_payment'] = 'Thanh toán';

$_['ppa_api_username'] = 'Giao diện ứng dụng (API) Username';
$_['ppa_api_username_note'] = 'Giao diện ứng dụng (API) Username';
$_['ppa_api_password'] = 'Giao diện ứng dụng (API) Password';
$_['ppa_api_password_note'] = 'Giao diện ứng dụng (API) Password';
$_['ppa_api_signature']	= 'Giao diện ứng dụng (API) chũ ký';
$_['ppa_api_signature_note'] = 'Giao diện ứng dụng (API) chữ ký';
$_['ppa_api_appid'] = 'Ứng dụng ID';
$_['ppa_api_appid_note'] = 'Ứng dụng ID';
$_['ppa_secret'] = 'Chia sẽ bí mật';
$_['ppa_secret_key'] = 'Key';
$_['ppa_secret_value'] = 'Định giá';
$_['ppa_secret_note'] = 'Chuỗi sẽ được sử dụng để xác nhận chung IPN bí mật. Đây có thể là bất cứ thứ gì';


$_['ppa_payment_type']					 = 'Kiểu thanh toán';
$_['ppa_payment_type_note']					 = 'Xem <a href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_APIntro">giới thiệu thanh toán PayPal Adaptive</a> để biết thêm chi tiết';
$_['ppa_payment_type_simple']					 = 'Cơ bản';
$_['ppa_payment_type_parallel']					 = 'Song song';
$_['ppa_payment_type_chained']					 = 'Được xâu chuỗi';

$_['ppa_feespayer']					 = 'Đối tượng nộp lệ phí';
$_['ppa_feespayer_note']					 = 'Xem <a href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_APIntro">giới thiệu thanh toán PayPal Adaptive</a> để biết thêm chi tiết';
$_['ppa_feespayer_sender']					 = 'Người gửi';
$_['ppa_feespayer_primaryreceiver']					 = 'Người nhận chính';
$_['ppa_feespayer_eachreceiver']					 = 'Mỗi người nhận';
$_['ppa_feespayer_secondaryonly']					 = 'chỉ duy nhất thứ cấp';

$_['ppa_receiver']					 = 'Người nhận';
$_['ppa_receivers']					 = 'Người nhận';
$_['ppa_receivers_note']					 = 'xem file hướng dẫn (readme) để biết thêm trong số tiền thanh toán giữa những người nhận';
$_['ppa_receiver_note']					 = '';
$_['ppa_receiver_email']					 = 'Email';
$_['ppa_receiver_amount']					 = 'Tỷ lệ phần trăm';
$_['ppa_receiver_percentage']					 = 'Tỷ lệ phần trăm';

$_['ppa_invalid_email']					 = 'Tài khoản PayPal không hợp lệ';
$_['ppa_invalid_email_note']					 = 'Phải làm gì nếu một trong những người bán có địa chỉ PayPal không hợp lệ';
$_['ppa_too_many_receivers']					 = 'Có quá nhiều người bán trong giỏ hàng';
$_['ppa_too_many_receivers_note']					 = 'Phải làm gì nếu giỏ hàng chứa các sản phẩm từ quá nhiều người bán';
$_['ppa_disable_module']					 = 'Vô hiệu hóa việc thích ứng thanh toán';
$_['ppa_balance_transaction']					 = 'Thay vì đó tạo một bảng ghi số dư';


$_['ppa_sandbox']					 = 'Sandbox Mode';
$_['ppa_sandbox_note']					 = 'Kiểm tra phần mở rộng trong Sandbox Mode yêu cầu thông tin Sandbox API';
$_['ppa_debug']					 = 'chế độ hiệu chỉnh lỗi';
$_['ppa_debug_note']					 = 'Chi tiết thông tin bảng ghi (logs) đến bảng ghi PayPal';

$_['ppa_total']					 = 'Tổng cộng';
$_['ppa_total_note']				 = 'Các kiểm tra sản phẩm phại đạt trước khi phương pháp thanh toán hoạt động.';

$_['ppa_status'] = 'Trạng thái:';
$_['ppa_completed_status'] = 'Trạng thánh hoàn chỉnh:';
$_['ppa_error_status'] = 'Trạng thái lỗi/thất bại';
$_['ppa_pending_status'] = 'Trạng thái cấp phát';

$_['ppa_geo_zone'] = 'Vùng GEO:';
$_['ppa_sort_order'] = 'Sắp xếp theo thứ tự:';


$_['ppa_error_secondaryonly'] = 'Các kiểu đối tượng nộp phí ""chỉ duy nhất thứ cấp" and "người nhận chính" chỉ có thể dử dụng cho thánh toán xâu chuỗi';

$_['ppa_success'] = 'Thành công: Bạn đã sửa đổi chi tiết tài khoản PayPal!';
$_['ppa_error_permission'] = 'Cảnh báo: Bạn không có quyền sửa đổi quyền thanh toán PayPal';
$_['ppa_error_receiver'] = 'Bạn cần phải chỉ định người nhận chính (#1)';
$_['ppa_error_credentials'] = 'Bạn cần phải xác định tất cả thông tin API';
$_['ppa_error_secret'] = 'Cả hai khóa bị mật và yêu cầu định giá';

$_['text_pp_adaptive'] = '<a onclick="window.open(\'https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_APIntro\');"><img src="view/image/payment/paypal.png" alt="PayPal Adaptive" title="PayPal Adaptive" style="border: 1px solid #EEEEEE;" /></a>';

?>