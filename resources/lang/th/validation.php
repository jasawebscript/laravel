<?php 

return array (
  'accepted' => ':attribute ต้องถูกยอมรับ',
  'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
  'after' => ':attribute ต้องเป็นวันที่หลังจาก :date',
  'after_or_equal' => ':attribute ต้องเป็นวันที่หลังจาก หรือเท่ากับ :date',
  'alpha' => ':attribute ต้องมีเฉพาะตัวอักษรเท่านั้น',
  'alpha_dash' => ':attribute ต้องมีเฉพาะตัวอักษร ตัวเลข และขีดกลางเท่านั้น',
  'alpha_num' => ':attribute ต้องมีเฉพาะตัวอักษรและตัวเลขเท่านั้น',
  'array' => ':attribute ต้องเป็น Array',
  'before' => ':attribute ต้องเป็นวันที่ก่อน :date',
  'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อน หรือเท่ากับ :date',
  'between' => 
  array (
    'numeric' => ':attribute ต้องมีค่าระหว่าง :min และ :max',
    'file' => ':attribute ต้องมีขนาดระหว่าง :min และ :max กิโลไบต์',
    'string' => ':attribute ต้องมีความยาวระหว่าง :min และ :max ตัวอักษร',
    'array' => ':attribute ต้องอยู่ระหว่าง :min และ :max รายการ',
  ),
  'boolean' => ':attribute ต้องมีค่าเป็น true หรือ false เท่านั้น',
  'confirmed' => 'การยืนยัน :attribute ไม่ตรงกัน',
  'date' => ':attribute ไม่ใช่วันที่ที่ถูกต้อง',
  'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format.',
  'different' => ':attribute และ :other ต้องแตกต่างกัน',
  'digits' => ':attribute ต้องเป็นตัวเลข :digits',
  'digits_between' => ':attribute ต้องอยู่ระหว่าง :min และ :max',
  'dimensions' => ':attribute ขนาดของรูปภาพไม่ถูกต้อง',
  'distinct' => ':attribute มีค่าซ้ำ',
  'email' => ':attribute ต้องเป็นอีเมลที่ถูกต้อง',
  'exists' => 'ค่า :attribute ที่เลือกไม่ถูกต้อง',
  'file' => ':attribute ต้องเป็นไฟล์',
  'filled' => 'จำเป็นต้องป้อน :attribute',
  'image' => ':attribute ต้องเป็นรูปภาพ',
  'in' => 'ค่า :attribute ที่เลือกไม่ถูกต้อง',
  'in_array' => ':attribute ไม่มีอยู่ใน :other',
  'integer' => ':attribute ต้องเป็น Integer',
  'ip' => ':attribute ต้องเป็น IP address ที่ถูกต้อง',
  'json' => ':attribute ต้องเป็น JSON String ที่ถูกต้อง',
  'max' => 
  array (
    'numeric' => ':attribute ต้องไม่มีค่ามากกว่า :max.',
    'file' => ':attribute ต้องไม่มีขนาดใหญ่กว่า :max กิโลไบต์',
    'string' => ':attribute ต้องไม่มีความยาวมากกว่า :max ตัวอักษร',
    'array' => ':attribute ต้องไม่มากกว่า :max รายการ',
  ),
  'mimes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
  'mimetypes' => ':attribute ต้องเป็นไฟล์ประเภท: :values',
  'min' => 
  array (
    'numeric' => ':attribute ต้องมีค่าอย่างน้อย :min',
    'file' => ':attribute ต้องมีขนาดอย่างน้อย :min กิโลไบต์',
    'string' => ':attribute ต้องมีความยาวอย่างน้อย :min ตัวอักษร',
    'array' => ':attribute ต้องมีอย่างน้อย :min รายการ',
  ),
  'not_in' => 'ค่า :attribute ที่เลือกไม่ถูกต้อง',
  'numeric' => ':attribute ต้องเป็นตัวเลข',
  'present' => ':attribute จำเป็นต้องมี',
  'regex' => ':attribute รูปแบบไม่ถูกต้อง',
  'required' => ':attribute จำเป็นต้องมี',
  'required_if' => 'จำเป็นต้องป้อน :attribute เมื่อ :other คือ :value',
  'required_unless' => 'จำเป็นต้องป้อน :attribute เว้นแต่ :other คือ :values',
  'required_with' => 'จำเป็นต้องป้อน :attribute เมื่อมี :values',
  'required_with_all' => 'จำเป็นต้องป้อน :attribute เมื่อมี :values',
  'required_without' => 'จำเป็นต้องป้อน :attribute เมื่อไม่มี :values',
  'required_without_all' => 'จำเป็นต้องป้อน :attribute เมื่อ :values ไม่มีค่าใดๆ เลย',
  'same' => ':attribute และ :other ต้องตรงกัน',
  'size' => 
  array (
    'numeric' => ':attribute ต้องมีขนาด :size.',
    'file' => ':attribute ต้องมีขนาด :size กิโลไบต์',
    'string' => ':attribute ต้องมีความยาว :size ตัวอักษร',
    'array' => ':attribute ต้องมี :size รายการ',
  ),
  'string' => ':attribute ต้องเป็น String',
  'timezone' => ':attribute ต้องเป็นโซนที่ถูกต้อง',
  'unique' => ':attribute ถูกใช้งานไปแล้ว',
  'uploaded' => 'การอัปโหลด :attribute ล้มเหลว',
  'url' => ':attribute มีรูปแบบไม่ถูกต้อง',
  'custom' => 
  array (
    'attribute-name' => 
    array (
      'rule-name' => 'custom-message',
    ),
    'country' => 
    array (
      'valid_country' => 'ประเทศที่คุณเลือก ไม่ถูกต้อง',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => 'คุณต้องคลิกที่กล่องนี้ เพื่อพิสูจน์ว่าคุณไม่ใช่บอท',
    ),
    'email' => 
    array (
      'exists' => 'ไม่พบอีเมลที่นี้ในฐานข้อมูลของเรา คุณควรลงทะเบียนก่อนใช้งาน',
    ),
  ),
  'attributes' => 
  array (
    'first-name' => 'ชื่อ',
    'last-name' => 'นามสกุล',
    'g-recaptcha-response' => 'การยืนยันด้วย reCaptcha',
  ),
);
