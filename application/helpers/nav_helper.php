<?php  
if ( ! function_exists('active_link'))
{
    function active_link($controller)
    {
        $CI = &get_instance();
        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }
}