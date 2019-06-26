<?php

if (!function_exists('classActivePath')) {
    function classActivePath($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? ' menu-open' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return ' menu-open';
        }
        return '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? 'active' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return 'active';
        }
        return '';
    }
}

if (! function_exists('imageview')) {

    function imageview($img)
    {

        if($img == null or $img == ''){
            $img ="avatar.png";
        }    

        return url('/').$img;
    }
}

if (! function_exists('imagethumb')) {

    function imagethumb($img)
    {

        if($img == null or $img == ''){
            $img ="avatar.png";
        }    

        return url('/').$img;
    }
}

if (! function_exists('seribu')) {

    function seribu($output)
    {
        return number_format( $output , 0 , '.' , '.' );
    }
}