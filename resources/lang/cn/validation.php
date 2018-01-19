<?php 

return array (
  'custom' => 
  array (
    'agreement' => 
    array (
      'required' => '您需要同意服务协议才能继续操作.',
      'accepted' => '您需要同意服务协议才能继续操作.',
    ),
    'wallet' => 
    array (
      'size' => '您提供的ETH地址无效.',
    ),
    'attribute-name' => 
    array (
      'rule-name' => '自定义消息',
    ),
    'country' => 
    array (
      'valid_country' => '您选择的国家有误.',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => '您需要完成下方的验证以确认您的身份.',
    ),
    'email' => 
    array (
      'exists' => '提供的邮箱未能在数据库中找到. 请先注册.',
    ),
  ),
  'accepted' => ':attribute 必须是可接受的.',
  'active_url' => ':attribute不是一个有效的URL.',
  'after' => ':attribute 必须是在 :date之后的日期.',
  'after_or_equal' => ':attribute 必须大于等于:date.',
  'alpha' => ':attribute 只能包含字母.',
  'alpha_dash' => ':attribute 只能包含字母数字和下划线.',
  'alpha_num' => ':attribute 只能包含字母数字.',
  'array' => ':attribute 必须是一个数组.',
  'before' => ':attribute 必须是在 :date之前的日期.',
  'before_or_equal' => ':attribute 必须是在 :date当天或是之后的日期.',
  'between' => 
  array (
    'numeric' => ':attribute 必须在:min 和 :max之间.',
    'file' => ':attribute 必须大于 :min KB并小于 :max KB.',
    'string' => ':attribute 必须大于 :min 字符并小于 :max 字符.',
    'array' => ':attribute 必须有 :min 至 :max 个对象.',
  ),
  'boolean' => ':attribute 字段必须是 true 或 false.',
  'confirmed' => ':attribute 确认信息不匹配.',
  'date' => ':attribute 不是一个有效的日期.',
  'date_format' => ':attribute 不符合格式 :format.',
  'different' => ':attribute 和 :other 不能相同.',
  'digits' => ':attribute 必须是:digits 位数字.',
  'digits_between' => ':attribute 必须在 :min 位和 :max 位之间.',
  'dimensions' => ':attribute 具有无效的图像尺寸。',
  'distinct' => ':attribute 字段具有重复值。',
  'email' => ':attribute 必须是一个有效的邮箱地址.',
  'exists' => '所选的 :attribute 无效',
  'file' => ':attribute 必须是文件.',
  'filled' => ':attribute 字段为必填.',
  'image' => ':attribute 必须是图像.',
  'in' => '所选:attribute 是无效的.',
  'in_array' => ':attribute 不存在于 :other 中.',
  'integer' => ':attribute 必须是整数.',
  'ip' => ':attribute 必须是有效IP地址.',
  'json' => ':attribute 必须是有效的JSON字符串.',
  'max' => 
  array (
    'numeric' => ':attribute 不能大于 :max.',
    'file' => ':attribute 不能大于 :max KB.',
    'string' => ':attribute 不能大于 :max 字符.',
    'array' => ':attribute 不能大于 :max 个对象.',
  ),
  'mimes' => ':attribute 必须是:values 文件类型.',
  'mimetypes' => ':attribute 必须是:values 文件类型.',
  'min' => 
  array (
    'numeric' => ':attribute 最少需要 :min.',
    'file' => ':attribute 不能少于 :min KB.',
    'string' => ':attribute 不能少于 :min 字符.',
    'array' => ':attribute 最少需要 :min个对象.',
  ),
  'not_in' => '所选:attribute 是无效的.',
  'numeric' => ':attribute  必须是数字.',
  'present' => ':attribute 字段必须存在.',
  'regex' => ':attribute 格式有误.',
  'required' => ':attribute 为必填字段.',
  'required_if' => '在:other 字段是 :values 的时候:attribute 字段为必填字段',
  'required_unless' => '除了:other 字段是 :values 的时候,其他情况下:attribute 字段为必填字段',
  'required_with' => ':values 存在时 :attribute 字段是必填字段.',
  'required_with_all' => ':values 存在时 :attribute 字段是必填字段.',
  'required_without' => ':values 不存在时 :attribute 字段是必填字段.',
  'required_without_all' => ':values 都不存在时:attribute 字段是必填字段.',
  'same' => ':attribute 和 :other必须相匹配.',
  'size' => 
  array (
    'numeric' => ':attribute 必须是 :size.',
    'file' => ':attribute 必须是:size KB大小.',
    'string' => ':attribute 必须是:size 个字符.',
    'array' => ':attribute 必须包含 :size 个对象.',
  ),
  'string' => ':attribute 必须是一个字符串.',
  'timezone' => ':attribute 必须是一个有效空间(valid zone).',
  'unique' => ':attribute 已存在.',
  'uploaded' => ':attribute 上传失败.',
  'url' => ':attribute 格式有误.',
  'attributes' => 
  array (
    'first-name' => '姓',
    'last-name' => '名',
    'g-recaptcha-response' => 'reCaptcha验证',
  ),
);
