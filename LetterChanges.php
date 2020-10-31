<?php
/*
 * Using the PHP language, have the function LetterChanges(str) take the str parameter
being passed and modify it using the following algorithm. Replace every letter in
the string with the letter following it in the alphabet (ie. c becomes d, z becomes a).
Then capitalize every vowel in this new string (a, e, i, o, u) and finally return this
modified string.
*/

function LetterChanges($str)
{
    $vowels = ["a", "e", "i", "o", "u"];

    $stringResult = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vowels))
            $stringResult .= strtoupper($str[$i]);
        elseif ($str[$i] == 'c')
            $stringResult .= 'd';
        elseif ($str[$i] == 'z')
            $stringResult .= 'A';
        else
            $stringResult .= $str[$i];
    }
    return $stringResult;
}


echo LetterChanges('ie. c becomes d, z becomes a');