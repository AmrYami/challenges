<?php
//Searching Challenge
//Have the function SearchingChallenge(str) take the str parameter being passed, which will contain only alphabetic
// characters and spaces, and return the first non-repeating character. For example: if str is "agettkgaeee"
// then your program should return k. The string will always contain at least one character and there will always
// be at least one non-repeating character.
//Examples
//Input: "abcdef"
//Output: a
//Input: "hello world hi hey"
//Output: w
$string = "ABBGAACCE";
$stringArray = str_split($string);
$countArr = array_count_values($stringArray);
$singleton = array_filter($countArr, function($elem){return $elem==1;});
print_r(array_keys($singleton)[0]);

