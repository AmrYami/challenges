<?php

/*
 * Using the PHP language, have the function SimpleSymbols(str) take the str parameter being passed and determine
 *  if it is an acceptable sequence by either returning the string true or false. The str parameter will be composed
 *  of + and = symbols with several letters between them (ie. ++d+===+c++==a) and for the string to be true each
 *  letter must be surrounded by a + symbol. So the string to the left would be false. The string will not be
 * empty and will have at least one letter.
 */


function SimpleSymbols($str)
{
    $letters = preg_replace("/[^a-z|A-Z]/", "", $str);// get all chars
    for ($i = 0; $i < strlen($letters); $i++) {
        if (!preg_match('/\+' . $letters[$i] . '\+/', $str))// check if char between +
            return 'false';
    }
    return 'true';
}

echo SimpleSymbols('+d++===+c++===+a+');