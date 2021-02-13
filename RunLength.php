<?php

//Have the function RunLength(str) take the str parameter being passed and return a compressed version of the string
// using the Run-length encoding algorithm. This algorithm works by taking the occurrence of each repeating character
// and outputting that number along with a single character of the repeating sequence.
// For example: "wwwggopp" would return 3w2g1o2p. The string will not contain any numbers, punctuation, or symbols.

function RunLength($str)
{
    $arr = str_split($str);
    $result = array_count_values($arr);
    $string = '';
    foreach ($result as $key => $value) {
        $string .= $value . $key;
    }
    return $string;
}

echo RunLength("wwwggopp");