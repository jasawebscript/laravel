<?php 

return array (
  'custom' => 
  array (
    'agreement' => 
    array (
      'required' => '다음단계로 가기전에 이용약관에 동의하셔야 합니다.',
      'accepted' => '다음 단계로 가기전에 이용약관에 동의하셔야 합니다.',
    ),
    'wallet' => 
    array (
      'size' => ' 당신이 제공한 ETH 주소는 유효하지 않습니다.',
    ),
    'attribute-name' => 
    array (
      'rule-name' => '맞춤형 메세지',
    ),
    'country' => 
    array (
      'valid_country' => '당신이 선택한 국가는 유효하지 않습니다.',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => '당신은 로봇이 아닌 것을 증명하기 위해 이 박스를 체크해야합니다',
    ),
    'email' => 
    array (
      'exists' => '입력하신 이메일이 우리의 데이터베이스에 없습니다. 먼저 가입해 주십시오.',
    ),
  ),
  'accepted' => ':attribute이 수용되어야 합니다',
  'active_url' => ':attribute 은 유효안 URL이 아닙니다',
  'after' => ':attribute은 :date 이후의 날짜여야합니다',
  'after_or_equal' => ':attribute은 :date과 동일하거나 이후의 날짜여야 합니다',
  'alpha' => ':attribute은 문자만 포함할 수 있습니다',
  'alpha_dash' => ':attribute는 오로지 문자, 숫자, 그리고 대쉬만 포함할 수 있습니다.',
  'alpha_num' => ':attribute는 오로지 문자와 숫자만 포함할 수 있습니다.',
  'array' => ':attribute은 배열이어야합니다.',
  'before' => ':attribute는 :date이전의 날짜여야 합니다.',
  'before_or_equal' => ':attribute은 :date과 동일하거나 이후의 날짜여야 합니다',
  'between' => 
  array (
    'numeric' => ':attribute는 :min과 :max사이에 있어야합니다.',
    'file' => ':attribute의 킬로바이트는 :min과 :max 사이어야합니다.',
    'string' => ':attribute는 :min과 :max 사이의 문자여야합니다.',
    'array' => ':attribute는 :min과 :max 사이의 아이템을 갖고 있어야합니다.',
  ),
  'boolean' => ':attribute의 영역은 참 또는 거짓이어야합니다.',
  'confirmed' => ':attribute 승인이 일치하지 않습니다.',
  'date' => ':attribute가 현재 유효기간이 아닙니다.',
  'date_format' => ':attribute가 포맷과 일치하비 않습니다.',
  'different' => ':attribute와 :다른 것이 서로 달라야 합니다.',
  'digits' => ':attribute는 숫자여야 합니다.',
  'digits_between' => ':attribute는 :min 와 :max 숫자 사이여야 합니다',
  'dimensions' => ':attribute는 유효하지 않은 이미지 차원입니다.',
  'distinct' => ':attribute는 중복되는 값이 있습니다.',
  'email' => ':attribute는 유효한 이메일 주소여야합니다.',
  'exists' => '선택된 :attribute 유효하지 않습니다',
  'file' => ':attribute는 파일이어야합니다.',
  'filled' => ':attribute 분야가 필요합니다.',
  'image' => ':attribute 는 이미지이어야 합니다.',
  'in' => '선택된 :attribute가 유효하지 않습니다',
  'in_array' => ':attribute 분야가 :other에 존재하지 않습니다.',
  'integer' => ':attribute는 정수이어야 합니다.',
  'ip' => ':attribute은 유효한 IP 주소여야합니다.',
  'json' => ':attribute는 유효한 JSON 문자열이어야 합니다.',
  'max' => 
  array (
    'numeric' => ':attribute는 :max보다 크면 안됩니다',
    'file' => ':attribute 는 :max 킬로바이트보다 커서는 안됩니다.',
    'string' => ':attribute 는 :max 보다 많아서는 안됩니다.',
    'array' => ':attribute 는 :max 보다 많아서는 안됩니다.',
  ),
  'mimes' => ':attribute는 : 유형의 파일이어야 합니다.',
  'mimetypes' => ':attribute는 : 유형의 파일이어야 합니다.',
  'min' => 
  array (
    'numeric' => ':attribute는 최소한 :min이어야 합니다.',
    'file' => ':attribute는 최소한 :min 킬로바이트보다 커야 합니다.',
    'string' => ':attribute는 최소한 :min 킬로바이트보다 커야 합니다.',
    'array' => ':attribute는 최소한 :min 킬로바이트보다 커야 합니다.',
  ),
  'not_in' => '선택된 :attribute는 유효하지 않습니다.',
  'numeric' => ':attribute는 숫자이어야 합니다.',
  'present' => ':attribute 분야는 현재이어야 합니다.',
  'regex' => ':attribute 포맷이 유효하지 않습니다.',
  'required' => ':attribute 분야가 필요합니다.',
  'required_if' => ':other 가 :value일 때 :attribute 분야가 필요합니다. ',
  'required_unless' => ':others가 :values에 있지 않는 한 :attribute분야가 필요합니다.',
  'required_with' => ':values가 존재할 때 :attribute 분야가 필요합니다.',
  'required_with_all' => ':values가 존재할 때 :attribute 분야가 필요합니다.',
  'required_without' => ':values가 존재하지 않을 때 :attribute 분야가 필요합니다.',
  'required_without_all' => '어떠한 :values도 존재하지 않을 때 :attribute 분야가 필요합니다.',
  'same' => ':attribute와 :others는 일치해야 합니다.',
  'size' => 
  array (
    'numeric' => ':attribute는 :size 크기이어야 합니다.',
    'file' => ':attribute는 :size 킬로바이트이어야 합니다.',
    'string' => ':attribute는 :size 크기이어야 합니다.',
    'array' => ':attribute 는 :size 아이템들을 포함해야만 합니다.',
  ),
  'string' => ':attribute는 문자열이여만합니다.',
  'timezone' => ':attribute는 유효한 범위여야합니다.',
  'unique' => ':attribute가 이미 실행되었습니다.',
  'uploaded' => ':attribute는 업로드를 실패하였습니다.',
  'url' => ':attribute 형식은 유효하지 않습니다.',
  'attributes' => 
  array (
    'first-name' => '성',
    'last-name' => '이름',
    'g-recaptcha-response' => 'reCaptcha 확인',
  ),
);
