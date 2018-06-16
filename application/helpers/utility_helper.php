<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()'))
{
    function asset_url()
    {
        return base_url().'assets/';
    }
}

if(!function_exists('root_url()'))
{
    function root_url()
    {
        return base_url();
    }
}

?>