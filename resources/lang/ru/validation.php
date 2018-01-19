<?php 

return array (
  'custom' => 
  array (
    'agreement' => 
    array (
      'required' => 'Вы должны согласиться с Условиями Использования для продолжения',
      'accepted' => 'Вы должны согласиться с Условиями Использования для продолжения',
    ),
    'wallet' => 
    array (
      'size' => 'ETH адрес, который вы указали не является действительным',
    ),
    'attribute-name' => 
    array (
      'rule-name' => 'пользовательское-соообщение',
    ),
    'country' => 
    array (
      'valid_country' => 'Страна, которую вы выбрали неверна.',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => 'Вы должны выбрать эту опцию, чтобы доказать, что вы не бот.',
    ),
    'email' => 
    array (
      'exists' => 'Данный адрес электронной почты отсутствует в нашей базе данных. Сначала вы должны зарегистрироваться.',
    ),
  ),
  'accepted' => ':attribute должен быть принят.',
  'active_url' => ':attribute не является допустимым URL.',
  'after' => ':attribute должен быть датой после :date.',
  'after_or_equal' => ':attribute должен быть датой после или равной :date.',
  'alpha' => ':attribute может содержать только буквы.',
  'alpha_dash' => ':attribute может содержать буквы, числа и тире.',
  'alpha_num' => ':attribute может содержать только буквы и числа.',
  'array' => ':attribute должен быть массивом.',
  'before' => ':attribute должен быть датой до :date.',
  'before_or_equal' => ':attribute должен быть датой до или равной :date.',
  'between' => 
  array (
    'numeric' => ':attribute должен быть равен значению между :min и :max.',
    'file' => ':attribute должен быть равен значению между :min и :max килобайтами.',
    'string' => ':attribute должен быть равен значению между :min и :max буквами.',
    'array' => ':attribute должен быть равен значению между :min и :max предметами.',
  ),
  'boolean' => 'Поле :attribute должно быть true или false.',
  'confirmed' => ':attribute подтверждение не соответствует.',
  'date' => ':attribute неправильная дата.',
  'date_format' => ':attribute не соответствует формату :format.',
  'different' => ':attribute и :other должны быть разными.',
  'digits' => ':attribute должен быть :digits цифр.',
  'digits_between' => ':attribute должен иметь значение между :min и :max цифрами.',
  'dimensions' => ':attribute имеет недопустимые размеры изображения.',
  'distinct' => 'Поле :attribute имеет повторяющееся значение.',
  'email' => ':attribute адрес электронной почты должен быть действительным.',
  'exists' => 'Выбранный :attribute неверный.',
  'file' => ':attribute должен быть файлом.',
  'filled' => 'Поле :attribute обязательно.',
  'image' => ':attribute должен быть изображением.',
  'in' => 'Выбранный :attribute неверный.',
  'in_array' => 'Поле :attribute не существует в :other.',
  'integer' => ':attribute должен быть целым числом.',
  'ip' => ':attribute должен иметь правильный IP-адрес.',
  'json' => ':attribute должен иметь правильную строку JSON.',
  'max' => 
  array (
    'numeric' => ':attribute не может быть больше чем :max.',
    'file' => ':attribute не может быть больше чем :max килобайт.',
    'string' => ':attribute не может быть больше чем :max символов.',
    'array' => ':attribute не может иметь больше чем :max предметов.',
  ),
  'mimes' => ':attribute должен быть файлом типа: :values.',
  'mimetypes' => ':attribute должен быть файлом типа: :values.',
  'min' => 
  array (
    'numeric' => ':attribute должен быть хотя бы :min.',
    'file' => ':attribute должен быть хотя бы :min килобайт.',
    'string' => ':attribute должен иметь хотя бы :min символов.',
    'array' => ':attribute должен иметь хотя бы :min предметов.',
  ),
  'not_in' => 'Выбранный :attribute неверный.',
  'numeric' => ':attribute должен быть числом.',
  'present' => 'Поле :attribute должно присутствовать.',
  'regex' => 'Формат :attribute неверный.',
  'required' => 'Поле :attribute необходимо.',
  'required_if' => 'Поле :attribute необходимо, если :other имеет значение :value.',
  'required_unless' => 'Поле :attribute необходимо, если только :other не находится в значениях :values.',
  'required_with' => 'Поле :attribute необходимо, когда :values присутствует.',
  'required_with_all' => 'Поле :attribute необходимо, когда :values присутствует.',
  'required_without' => 'Поле :attribute необходимо, когда :values отсутствует.',
  'required_without_all' => 'Поле :attribute необходимо, когда не одно из значений :values не присутствует.',
  'same' => ':attribute и :other должны совпадать.',
  'size' => 
  array (
    'numeric' => ':attribute должен быть :size.',
    'file' => ':attribute должен быть :size килобайт.',
    'string' => ':attribute должен быть :size символов.',
    'array' => ':attribute должен содержать :size предметов.',
  ),
  'string' => ':attribute должен быть строкой.',
  'timezone' => ':attribute должна быть действительной зоной.',
  'unique' => ':attribute уже был взят.',
  'uploaded' => ':attribute не удалось загрузить.',
  'url' => 'Формат :attribute неверный.',
  'attributes' => 
  array (
    'first-name' => 'Имя',
    'last-name' => 'Фамилия',
    'g-recaptcha-response' => 'Проверка reCaptcha',
  ),
);
