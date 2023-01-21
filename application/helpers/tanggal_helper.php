<?php

if (!function_exists('format_indo')) {
    function format_indo($format = 'd-m-Y', $originalDate)
    {
        return date($format, strtotime($originalDate));
    }
}
