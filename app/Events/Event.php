<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

abstract class Event
{
    use SerializesModels;

    protected function getLanguageSuffix() {
        $language = config('app.locale');
        $defaultLanguage = config('app.fallback_locale');
        $availableLanguages = array_keys(app('languages'));
        $mailableLanguages = array_intersect($availableLanguages, app('mailableLanguages'));

        if($language != $defaultLanguage && in_array($language, $mailableLanguages)) {
            return '_'.$language;
        }

        return '';
    }
}
