<?php

use App\Models\Configuration;
use Illuminate\Support\Facades\Route;

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
if (! function_exists('getCssClassForGeneral')) {
    function getCssClassForGeneral($name){
        $route = Route::getCurrentRoute()->getName();
        if(str_contains($route, 'admin.categories') || str_contains($route, 'admin.genres') 
        || str_contains($route, 'admin.publications') || str_contains($route, 'admin.authors')
        || str_contains($route, 'admin.sliders'))
        {
            return returnCssClass($name);  
        }
        
    }
}
if (! function_exists('getCssClassForWorld')) {
    function getCssClassForWorld($name){
        $route = Route::getCurrentRoute()->getName();
        if(str_contains($route, 'admin.languages') || str_contains($route, 'admin.countries'))
        {
            return returnCssClass($name);
        }
        
    }
}
if (! function_exists('getCssClassForBook')) {
    function getCssClassForBook($name){
        $route = Route::getCurrentRoute()->getName();
        if(str_contains($route, 'admin.books') || str_contains($route, 'admin.book-types')
        ||str_contains($route, 'admin.book-faqs'))
        {
            return returnCssClass($name);            
        }
        
    }
}
function returnCssClass($name){
    switch($name){
        case 'active':
            return 'active';
            break;
        case 'show':
            return 'show';
            break;
        case 'true':
            return 'true';
            break;        
    }
}
