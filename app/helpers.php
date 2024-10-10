<?php

if (!function_exists('convertToArabicNumerals')) {
    function convertToArabicNumerals($number)
    {
        $western_arabic = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $eastern_arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

        return str_replace($western_arabic, $eastern_arabic, $number);
    }
}
