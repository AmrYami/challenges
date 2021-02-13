<?php


/*
 * Using the PHP language, have the function LetterCapitalize(str) take the str parameter
 * being passed and capitalize the first letter of each word.
 * Words will be separated by only one space.
 * Use the Parameter Testing feature in the box below to test your code with different arguments.
 */

function LetterCapitalize($str)
{
    return ucwords($str);
}

echo LetterCapitalize('Use the Parameter Testing feature in the box below to test your code with different arguments');


echo '<br><br>';
echo '<br><br>';
//String Challenge
//Have the function StringChallenge(str) take the str parameter being passed and return it in proper camel case format where the first letter of each word is capitalized (excluding the first letter). The string will only contain letters and some combination of delimiter punctuation characters separating each word.
//
//For example: if str is "BOB loves-coding" then your program should return the string bobLovesCoding.
//Examples
//Input: "cats AND*Dogs-are Awesome"
//Output: catsAndDogsAreAwesome
//Input: "a b c d-e-f%g"
//Output: aBCDEFG

function StringChallenge($str)
{
    $removeSpecialCahrs = preg_replace('/[^A-Za-z]/', ' ', $str);
    $stringCamelCase = ucwords(strtolower($removeSpecialCahrs));
    $stringWithoutSpace = str_replace(' ', '', $stringCamelCase);
    $firstChar = $stringWithoutSpace[0];
    $removeFirstCharFromString = substr($stringWithoutSpace, 1);
    $firstChar = strtolower($firstChar);
    return $firstChar . $removeFirstCharFromString;
}

// keep this function call here
echo StringChallenge('cats AND*Dogs-are Awesome');




