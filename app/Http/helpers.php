<?php


use App\VRLanguageCodes;

function getActiveLanguages()
{
    $config = VRLanguageCodes::where('is_active', 1)->pluck('name', 'id')->toArray();

    return $config;
}

