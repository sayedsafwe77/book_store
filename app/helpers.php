<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Pluralizer;

if(!function_exists('generate_breadcrumbs')){
    function generate_breadcrumbs()
    {
        $segments = Request::segments();
        $breadcrumbs = [];
        $url = '';

        foreach ($segments as $index => $segment) {
            $url .= '/' . $segment;
            $text = ucfirst($segment);

            if(is_numeric($text)) continue;
            $breadcrumbs[] = [
                'text' => $text,
                'url'  => url($url)
            ];
        }

        return $breadcrumbs;
    }
}

if(!function_exists('capitalize')){
    function capitalize($text)
    {
        return Pluralizer::plural(strtolower($text));
    }
}
