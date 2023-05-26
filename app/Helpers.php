<?php
use Illuminate\Support\Str;
//this is laravel helper file created in App/Helpers.php
function getActive($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}




function activeMenu($url)
{
    return request()->is($url) ? 'active subdrop' : '';
}

function activeMenuMultiple($urls)
{
    foreach ($urls as $url) {
        if (request()->is($url)) {
            return 'active';
        }
    }
}


function activeMenuMultipleArray($urls)
{
    foreach ($urls as $url) {
        if (request()->is($url)) {
            return 'active';
        }
    }
}