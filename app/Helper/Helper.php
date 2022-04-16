<?php

use App\Models\Configuration;

$config = null;
if (! function_exists('getConfiguration')) {
    function getConfiguration($key)
    {
        global $config;
        if (!$config) {
            $config = Configuration::all();
        }

        $value =  $config->where('configuration_key', $key)->first();
        if (isset($value)) {
            return $value->configuration_value;
        }
        return null;
    }
}
