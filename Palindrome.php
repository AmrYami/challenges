<?php

/**
 * Have the function Palindrome(str) take the str parameter being passed and return the string true if the parameter
 * is a palindrome, (the string is the same forward as it is backward) otherwise return the string false. For example:
 * "racecar" is also "racecar" backwards. Punctuation and numbers will not be part of the string.
 *
 * Input = "never odd or even"   -> Output = "true"
 * Input = "eye"                 -> Output = "true"
 *
 */

function Palindrome($str)
{
    $str = preg_replace('/[^a-z|A-Z|1-9]/', '', $str);
    $reverse = strrev($str);
    if ($reverse === $str)
        return 'true';
    return 'false';
}

echo Palindrome('eyey');