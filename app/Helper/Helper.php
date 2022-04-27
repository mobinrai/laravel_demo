<?php

use App\Models\BookReview;
use App\Models\Configuration;
use App\Models\User;
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
if (! function_exists('getUserName')) {
    function getUserName($id) {
        $user = User::whereId($id)->pluck('name')[0];
        return $user;
    }
}

if (! function_exists('getTotalBookStars')) {
    function getTotalBookStars($reviews) {
        $totalStars = 0;
        $ratingValues = 0;        
        foreach($reviews as $review){
            $ratingValues += $review->stars;
        }

        $totalStars = $ratingValues/ $reviews->count();
        
        return $totalStars;
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
