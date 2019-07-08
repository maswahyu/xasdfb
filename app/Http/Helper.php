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

if (! function_exists('number_format_short')) {
    function number_format_short( $n ) {
        $n_format = 0;
        $suffix = '';
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }
}