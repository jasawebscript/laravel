<?php 

return array (
  'custom' => 
  array (
    'attribute-name' => 
    array (
      'rule-name' => 'mensaje personalizado',
    ),
    'agreement' => 
    array (
      'required' => 'Para poder continuar debes aceptar los Términos del Servicio',
      'accepted' => 'Para poder continuar debes aceptar los Términos del Servicio',
    ),
    'wallet' => 
    array (
      'size' => 'La dirección ETH que ha proporcionado no parece ser válida',
    ),
    'country' => 
    array (
      'valid_country' => 'El país que ha seleccionado no es válido.',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => 'Debes seleccionar esta casilla para demostrar que no eres un bot',
    ),
    'email' => 
    array (
      'exists' => 'El correo electrónico no se encontró en nuestra base de datos. Debes registrarte primero.',
    ),
  ),
  'accepted' => ':attribute debe ser aceptado.',
  'active_url' => ':attribute is not a valid URL.',
  'after' => ':attribute debe ser una fecha posterior a :date.',
  'after_or_equal' => ':attribute debe ser una fecha posterior o igual a :date.',
  'alpha' => ':attribute sólo puede contener letras.',
  'alpha_dash' => ':attribute sólo puede contener letras, números y guiones.',
  'alpha_num' => ':attribute sólo puede contener letras y números.',
  'array' => ':attribute debe ser una matriz.',
  'before' => ':attribute debe ser una fecha antes :date.',
  'before_or_equal' => ':attribute debe ser una fecha anterior o igual a :date.',
  'between' => 
  array (
    'numeric' => ':attribute debe estar entre :min y :max.',
    'file' => ':attribute debe estar entre :min y :max kilobytes.',
    'string' => ' :attribute debe tener entre :min y :max caracteres',
    'array' => ':attribute debe tener entre :min and :max artículos.',
  ),
  'boolean' => ':attribute debe ser verdadero o falso',
  'confirmed' => ':attribute la confirmación no coincide.',
  'date' => ':attribute no es una fecha válida.',
  'date_format' => ':attribute no coincide con el formato :format.',
  'different' => ':attribute y :other deben ser diferentes',
  'digits' => ':attribute debe ser :digits dígitos',
  'digits_between' => ':attribute debe ser entre :min y :max dígitos.',
  'dimensions' => ':attribute tiene dimensiones de imagen no válidas.',
  'distinct' => ':attribute tiene un valor duplicado.',
  'email' => ':attribute debe ser una dirección de correo electrónico válida.',
  'exists' => 'El :attribute seleccionado no es valido',
  'file' => ':attribute debe ser un archivo.',
  'filled' => ':attribute es requerido',
  'image' => ':attribute debe ser una imagen.',
  'in' => 'El :attribute selecionado no es valido.',
  'in_array' => ':attribute no existe en :other.',
  'integer' => ':attribute debe ser un entero.',
  'ip' => ':attribute debe ser una dirección de IP válida',
  'json' => ':attribute debe ser una cadena JSON válida.',
  'max' => 
  array (
    'numeric' => ':attribute no puede ser mayor a :max.',
    'file' => ':attribute no puede ser mayor a :max kilobytes.',
    'string' => ':attribute no puede ser mayor a :max caracteres',
    'array' => ':attribute puede no tener más de :max artículos.',
  ),
  'mimes' => ':attribute debe ser un archivo de tipo: :values.',
  'mimetypes' => ':attribute debe ser un archivo de tipo: :values.',
  'min' => 
  array (
    'numeric' => ':attribute debe ser de al menos :min.',
    'file' => ':attribute debe ser de al menos :min kilobytes.',
    'string' => ':attribute debe ser de al menos :min caracteres',
    'array' => ':attribute debe ser de al menos :minartículos.',
  ),
  'not_in' => 'El :attribute seleccionado no es valido',
  'numeric' => ':attribute tiene que ser un número.',
  'present' => ':attribute debe estar presente.',
  'regex' => ':attribute el formato no es válido.',
  'required' => ':attribute es requerido',
  'required_if' => ':attribute es requerido cuando :other es :value.',
  'required_unless' => ':attribute ampo es obligatorio a menos que :other es en :values.',
  'required_with' => ':attribute es requerido cuando :values está presente.',
  'required_with_all' => ':attribute es requerido cuando  :values está presente.',
  'required_without' => ':attribute es requerido cuando :values no está presente.',
  'required_without_all' => ':attribute es requerido cuando ninguno :values está presente.',
  'same' => ':attribute y :other deben coincidir',
  'size' => 
  array (
    'numeric' => ':attribute debe ser de :size.',
    'file' => ':attribute debe ser de :size kilobytes.',
    'string' => ' :attribute debe ser de :size caracteres',
    'array' => ':attribute debe contener :size artículos.',
  ),
  'string' => ':attribute debe ser una cadena.',
  'timezone' => ':attribute debe ser una zona válida.',
  'unique' => ':attribute ya ha sido tomado',
  'uploaded' => 'The :attribute no pudo subirse',
  'url' => ':attribute el formato no es válido.',
  'attributes' => 
  array (
    'first-name' => 'Nombre',
    'last-name' => 'Apellido',
    'g-recaptcha-response' => 'Validación reCaptcha',
  ),
);
