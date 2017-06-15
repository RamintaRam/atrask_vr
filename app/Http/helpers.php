<?php


use App\VRLanguageCodes;

function getActiveLanguages()
{
    $config = VRLanguageCodes::where('is_active', 1)->pluck('name', 'id')->toArray();
    $locale = app()->getLocale();

    if (!isset($config[$locale]))
    {
        $locale = config('app.fallback_locale');

        if (!isset($config[$locale]))
        {
            return $config;
        }
    }

    $config = array($locale => $config[$locale]) + $config;
    return $config;
}

