<?php


use App\VRLanguageCodes;

function getActiveLanguages()
{
    $data = new VRLanguageCodes();
    $config['languages'] = VRLanguageCodes::where('is_active', '=', '1')->pluck('id', 'name')->toArray();

}