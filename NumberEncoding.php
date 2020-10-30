<?php

/**
 * have the function NumberEncoding(str) take the str parameter and encode the message
 * according to the following rule: encode every letter into its corresponding numbered
 * position in the alphabet.
 * Symbols and spaces will also be used in the input.
 * For example: if str is "af5c a#!" then your program should return 1653 1#!.
 * Input = "hello 45" Output = 85121215 45
 * Input = "jaj-a" Output = 10110-1
 *
 */

function NumberEncoding($str)
{
    $alphs = range('a', 'z');
    $alphs = array_flip($alphs);
    $str = strtolower($str);
    $res = null;
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_alpha($str[$i]))
            $res .= $alphs[$str[$i]] + 1;
        else
            $res .= $str[$i];
    }
    return $res;

}

echo NumberEncoding('jaj-a');