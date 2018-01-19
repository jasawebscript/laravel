@if($currentLanguage == "ru")
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,100i,300,300i,400,400i,500,500i&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Mono|Roboto:100,300,400,500,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
@else
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:100,200,300,400,500,600,700,900|Work+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
@endif

<link rel="stylesheet" href="{{ asset_rev('css/'. ($currentLanguage == 'ru' ? 'lang-ru.css' : 'default.css')) }}">