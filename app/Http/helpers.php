<?php


use App\VRLanguageCodes;
use App\VRMenu;

//helperyje aprašomos funkcijos nei publis, nei private nei protected.
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

//apsirašom funkciją, kurią naudosime AppServicePtovider,
// kad galėtume pashareinti į frontend blade.
function getFrontEndMenu()
{
    $data = VRMenu::get()->toArray();
    return $data;
}
