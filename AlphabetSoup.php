<?php

/**
 * have the function AlphabetSoup(str) take the str string parameter being
 * passed and return the string with the letters in alphabetical order
 * (ie. hello becomes ehllo). Assume numbers and punctuation symbols will
 * not be included in the string.
 *
 * Input = "coderbyte" -> Output = "bcdeeorty"
 * Input = "hooplah" -> Output = "ahhloop"
 */
function alphabetize($string)
{
    $stringParts = str_split($string);
    sort($stringParts);
    return implode('', $stringParts);
}
echo alphabetize("hello");
