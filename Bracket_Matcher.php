<?php

function BracketMatcher($str)
{
    $string = preg_replace('`()|([^)(]+)`','',$str);//remove all chars without what we need
    $result = RemoveBrackets($string);// send to RemoveBrackets
    if (strlen($result) > 0)
        return '0';
     else
        return '1';
}

function RemoveBrackets($string)
{
    if (preg_match('/\(\)/', $string))// if string has what we need
        $string = preg_replace('/\(\)/', '', $string);// remove chars from string
    if (preg_match('/\(\)/', $string))// if string has what we need
        $string = RemoveBrackets($string); // recursive
    return $string;
}

// keep this function call here
echo BracketMatcher('fge ts(fop en(p hp2 ( 34 aa d://st din, r))');
