<?php

/*
 * Using the PHP language, have the function CaesarCipher(str,num) take the str parameter
 * and perform a Caesar Cipher shift on it using the num parameter as the shifting number.
 * A Caesar Cipher works by shifting each letter in the string N places down in the alphabet
 * (in this case N will be num). Punctuation, spaces, and capitalization should remain intact.
 * For example if the string is "Caesar Cipher" and num is 2 the output should be "Ecguct Ekrjgt".
 * Input = "Hello" & num = 4 Output = "Lipps"
 * Input = "abc" & num = 0 Output = "abc"
 */

function CaesarCipher($str, $num)
{
    $alphabetLow = range('a', 'z');
    $alphabetHigh = range('A', 'Z');
    $letterMap = array();

    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_lower($str[$i])) {
            $letterMap[] = getCharAfterAddNumber($str[$i], $alphabetLow, $num);
        } elseif (ctype_upper($str[$i])) {
           $letterMap[] = getCharAfterAddNumber($str[$i], $alphabetHigh, $num);
        } else {
            $letterMap[] = $str[$i];
        }
    }
    return implode($letterMap);
}

function getCharAfterAddNumber($str, $alphabet, $num){
    $arr_key = array_search($str, $alphabet);// get key of char
    $arr_key = $arr_key + $num > 25 ? $arr_key + $num - 26 : $arr_key + $num;// if key + number > number of alphabet then we need to make it -26 to re-round else add number + key to get the char we need
    return $alphabet[$arr_key];
}

echo CaesarCipher('abc', 2);