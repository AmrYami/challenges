<?php

function BracketMatcher($str)
{
    $string = preg_replace("/[a-zA-Z0-9\s-]/", "", $str);// remove all chars and spaces
    $string = preg_replace("/[^\(\)]/", "", $string);//remove all special chars without what we need
    $result = RemoveBrackets($string);// send to RemoveBrackets
    if (strlen($result) > 0)
        return '0';
     else
        return '1';


}

function RemoveBrackets($string)
{
    $result = $string;
    if (preg_match('/\(\)/', $result))// if string has what we need
        $result = preg_replace('/\(\)/', '', $string);// remove chars from string
    if (preg_match('/\(\)/', $result))// if string has what we need
        $result = RemoveBrackets($result); // recursive
    return $result;
}

// keep this function call here
echo BracketMatcher('fge ts(fop en(p hp2 ( 3)4 aa d://st din, r))');
