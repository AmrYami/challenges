<?php

/*
 * For this challenge you will determine if string 1 can be rearranged into string 2
 * Using the PHP language, have the function StringScramble(str1,str2) take both parameters
 * being passed and return the string true if a portion of str1 characters
 * can be rearranged to match str2, otherwise return the string false.
 * For example: if str1 is "rkqodlw" and str2 is "world" the output should return true.
 * Punctuation and symbols will not be entered with the parameters.
 *
 */

function StringScramble($str1, $str2)
{
    if (strlen($str1) < strlen($str2))
        return 'false';
    $str1 = str_split($str1);
    for ($i = 0; $i < strlen($str2); $i++) {
        if (!in_array($str2[$i], $str1) || (empty($str1) && strlen($str2) > $i))
            return "false";
        $checked_letter = array_search($str2[$i], $str1);
        unset($str1[$checked_letter]);
    }
    return "true";
}

echo StringScramble('rkqodlw', 'world');