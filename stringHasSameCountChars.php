<?php
function implement($str){
    $str = strtolower($str);
    return substr_count($str, 'x') == substr_count($str, 'o');
}