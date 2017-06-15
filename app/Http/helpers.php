<?php


use App\VRLanguageCodes;

function getActiveLanguages()
{
    $locale = app()->getLocale();
    $config = VRLanguageCodes::where('is_active', 1)->pluck('name', 'id')->toArray();

    $config = array($locale => $config[$locale]) + $config;

        return $config;


//        if($locale )

//    dd($config);


}

