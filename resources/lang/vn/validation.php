<?php 

return array (
  'custom' => 
  array (
    'attribute-name' => 
    array (
      'rule-name' => 'loi-nhan-tu-chon',
    ),
    'agreement' => 
    array (
      'required' => 'Bạn phải đồng ý với Điều Khoản Dịch Vụ để tiếp tục.',
      'accepted' => 'Bạn phải đồng ý với Điều Khoản Dịch Vụ để tiếp tục.',
    ),
    'wallet' => 
    array (
      'size' => 'Địa chỉ ETH bạn cung cấp có vẻ như không đúng',
    ),
    'country' => 
    array (
      'valid_country' => 'Quốc gia bạn chọn không hợp lệ.',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => 'Bạn phải chọn ô này để xác nhận bạn không phải là bot máy tính',
    ),
    'email' => 
    array (
      'exists' => 'Email của bạn không tìm thấy trên dữ liệu của chúng tôi. Bạn cần đăng ký trước.',
    ),
  ),
  'accepted' => ':attribute phải được chấp nhận.',
  'active_url' => ':attribute không phải URL hợp lệ.',
  'after' => ':attribute phải là ngày sau ngày :date.',
  'after_or_equal' => ':attribute phải là ngày sau hoặc bằng với ngày :date.',
  'alpha' => ':attribute chỉ chứa ký tự.',
  'alpha_dash' => ':attribute chỉ chứa ký tự, số, và dấu gạch ngang.',
  'alpha_num' => ':attribute chỉ chứa ký tự, và số.',
  'array' => ':attribute phải là chuỗi.',
  'before' => ':attribute phải là ngày trước ngày :date.',
  'before_or_equal' => ':attribute phải là ngày trước hoặc bằng với ngày :date.',
  'between' => 
  array (
    'numeric' => ':attribute phải nằm trong khoảng :min và :max.',
    'file' => ':attribute phải nằm trong khoảng:min và :max kilobytes.',
    'string' => ':attribute phải từ ký tự :min đến :max.',
    'array' => ':attribute phải từ số :min đến :max.',
  ),
  'boolean' => ':attribute phải đúng hoặc sai.',
  'confirmed' => 'Xác nhận :attribute không khớp.',
  'date' => ':attribute không phải là ngày hợp lệ.',
  'date_format' => ':attribute không khớp với định dạng :format.',
  'different' => ':attribute và :other phải khác nhau.',
  'digits' => ':attribute phải là :digits số.',
  'digits_between' => ':attribute phải nằm trong khoảng từ :min đến :max số.',
  'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
  'distinct' => ':attribute có giá trị trùng lắp.',
  'email' => ':attribute phải là email hợp lệ.',
  'exists' => 'Chọn :attribute không hợp lệ.',
  'file' => ':attribute phải là file.',
  'filled' => ':attribute cần điền.',
  'image' => ':attribute phải là hình ảnh.',
  'in' => ':attribute không hợp lệ.',
  'in_array' => 'Trường :attribute không tồn tại trong :other.',
  'integer' => ':attribute phải là số nguyên.',
  'ip' => ':attribute phải là địa chỉ IP hợp lệ.',
  'json' => ':attribute phải chứa chuỗi JSON.',
  'max' => 
  array (
    'numeric' => ':attribute không được lớn hơn :max.',
    'file' => ':attribute không được lớn hơn :max kilobytes.',
    'string' => ':attribute không được lớn hơn :max ký tự.',
    'array' => ':attribute không được lớn hơn :max sản phẩm.',
  ),
  'mimes' => ':attribute phải là loại file :values.',
  'mimetypes' => ':attribute phải là loại file :values.',
  'min' => 
  array (
    'numeric' => ':attribute phải ít nhất là :min.',
    'file' => ':attribute phải ít nhất là :min kilobytes.',
    'string' => ':attribute phải ít nhất là :min ký tự.',
    'array' => ':attribute phải có ít nhất :min sản phẩm.',
  ),
  'not_in' => ':attribute được chọn không hợp lệ.',
  'numeric' => ':attribute phải là số.',
  'present' => ':attribute phải tồn tại',
  'regex' => 'Định dạng :attribute không hợp lệ.',
  'required' => 'Trường :attribute là cần thiết.',
  'required_if' => 'Trường :attribute cần thiết khi :other là :value.',
  'required_unless' => 'Trường :attribute cần thiết trừ khi :other nằm trong :value.',
  'required_with' => 'Trường :attribute là cần thiết khi có :values',
  'required_with_all' => 'Trường :attribute là cần thiết khi có :values',
  'required_without' => 'Trường :attribute là cần thiết khi không có :values',
  'required_without_all' => 'Trường :attribute là cần thiết khi không có :values nào ',
  'same' => ':attribute và :other phải khớp nhau.',
  'size' => 
  array (
    'numeric' => ':attribute phải là :size.',
    'file' => ':attribute phải là :size kilobytes.',
    'string' => ':attribute phải là :size ký tự.',
    'array' => ':attribute phải chứa :size sản phẩm.',
  ),
  'string' => ':attribute phải là chuỗi.',
  'timezone' => ':attribute phải là zone hợp lệ.',
  'unique' => ':attribute đã được lấy.',
  'uploaded' => ':attribute upload thất bại.',
  'url' => ':attribute format không đúng.',
  'attributes' => 
  array (
    'first-name' => 'Tên',
    'last-name' => 'Họ',
    'g-recaptcha-response' => 'Xác thực lại mã capcha',
  ),
);
