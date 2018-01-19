<?php 

return array (
  'custom' => 
  array (
    'attribute-name' => 
    array (
      'rule-name' => 'custom-message',
    ),
    'agreement' => 
    array (
      'required' => 'Devi accettare i Termini di servizio per poter procedere.',
      'accepted' => 'Devi accettare i Termini di servizio per poter procedere.',
    ),
    'wallet' => 
    array (
      'size' => 'L\' indirizzo ETH fornito non sembra valido',
    ),
    'country' => 
    array (
      'valid_country' => 'Il paese selezionato non è valido.',
    ),
    'g-recaptcha-response' => 
    array (
      'required' => 'È necessario selezionare questa casella per dimostrare di non essere un bot.',
    ),
    'email' => 
    array (
      'exists' => 'La mail data non è stata trovata nel nostro database. Devi iscriverti prima.',
    ),
  ),
  'attributes' => 
  array (
    'g-recaptcha-response' => 'Convalida di reCaptcha',
    'first-name' => 'Nome',
    'last-name' => 'Cognome',
  ),
  'accepted' => ':attribute deve essere accettato.',
  'active_url' => ':attribute non è un URL valido.',
  'after' => ':attribute deve essere una data posteriore a :date.',
  'after_or_equal' => ':attribute deve essere una data posteriore o uguale a :date.',
  'alpha' => ':attribute può solo contenere lettere.',
  'alpha_dash' => ':attribute può contenere solo lettere, numeri e trattini.',
  'alpha_num' => ':attribute può contenere solo lettere e numeri.',
  'array' => ':attribute deve essere un array.',
  'before' => ':attribute deve essere una data precedente a :date.',
  'before_or_equal' => ':attribute deve essere una data antecedente o uguale a :date.',
  'between' => 
  array (
    'numeric' => ':attribute deve essere tra :min e :max.',
    'file' => ':attribute deve essere tra :min e :max kilobyte.',
    'string' => ':attribute deve essere tra :min e :max caratteri.',
    'array' => ':attribute deve avere tra :min e :max elementi.',
  ),
  'boolean' => ':attribute deve essere vero o falso.',
  'confirmed' => ':attribute non corrisponde. ',
  'date' => ':attribute non è una data valida.',
  'date_format' => ':attribute non corrisponde al formato :format.',
  'different' => ':attribute e :other devono essere diversi.',
  'digits' => ':attribute deve essere di :digits cifre.',
  'digits_between' => ':attribute deve essere tra :min e :max cifre.',
  'dimensions' => ':attribute ha dimensioni immagine non valide.',
  'distinct' => ':attribute ha un valore duplicato.',
  'email' => ':attribute deve essere un indirizzo email valido.',
  'exists' => ':attribute non è valido.',
  'file' => ':attribute deve essere un file.',
  'filled' => ':attribute è richiesto.',
  'image' => ':attribute deve essere un immagine.',
  'in' => ':attribute non è valido.',
  'in_array' => ':attribute non esiste in :other.',
  'integer' => ':attribute deve essere un intero.',
  'ip' => ':attribute deve essere un indirizzo IP valido.',
  'json' => ':attribute deve essere una stringa JSON valida.',
  'max' => 
  array (
    'numeric' => ':attribute non può essere più grande di :max.',
    'file' => ':attribute non può essere più grande di :max kilobyte.',
    'string' => ':attribute non può essere più grande di :max caratteri.',
    'array' => ':attribute non può avere più :max elementi.',
  ),
  'mimes' => ':attribute deve essere un file di tipo: :values.',
  'mimetypes' => ':attribute deve essere un file di tipo: :values.',
  'min' => 
  array (
    'numeric' => ':attribute deve essere almeno :min.',
    'file' => ':attribute deve essere almeno di :min kilobyte.',
    'string' => ':attribute deve essere almeno di :min caratteri.',
    'array' => ':attribute deve essere almeno di :min elementi.',
  ),
  'not_in' => ':attribute non è valido.',
  'numeric' => ':attribute deve essere un numero.',
  'present' => ':attribute deve essere presente.',
  'regex' => ':attribute non è valido.',
  'required' => ':attribute è richiesto.',
  'required_if' => ':attribute è richiesto quando :other è :value.',
  'required_unless' => ':attribute campo è richiesto a meno che :other è in :values.',
  'required_with' => ':attribute è richiesto quando :values è presente.',
  'required_with_all' => ':attribute è richiesto quando :values è presente.',
  'required_without' => ':attribute è richiesto quando :values non è presente.',
  'required_without_all' => ':attribute è richiesto quando nessun :values è presente.',
  'same' => ':attribute e :other devono corrispondere.',
  'size' => 
  array (
    'numeric' => ':attribute deve essere :size.',
    'file' => ':attribute deve essere :size kilobyte.',
    'string' => ':attribute deve essere di :size caratteri.',
    'array' => ':attribute deve contenere :size elementi.',
  ),
  'string' => ':attribute deve essere una stringa.',
  'timezone' => ':attribute deve essere una zona valida.',
  'unique' => ':attribute è stato già preso.',
  'uploaded' => ':attribute ha fallito il caricamento.',
  'url' => ':attribute non è valido.',
);
