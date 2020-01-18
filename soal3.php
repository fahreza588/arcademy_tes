<?php

function cek_kata($str)
{
    if (is_string($str)) {
        $strs = preg_split('/\s+/', $str);
        return "(" . str_word_count($str) . "/" . count($strs) . ")";
    } else {
        return "Parameter harus string";
    }
}

$string = "Ini adalah sebuah kata";
echo " Input 1  : $string";
echo "<br>";
echo " Output 1 : " . cek_kata($string);
echo "<hr>";

$string = '2 pasang sandal hilang';
echo " Input 2  : $string";
echo "<br>";
echo " Output 2 : " . cek_kata($string);
echo "<hr>";

$string = 33;
echo " Input 3  : $string";
echo "<br>";
echo " Output 3 : " . cek_kata(33);
echo "<hr>";